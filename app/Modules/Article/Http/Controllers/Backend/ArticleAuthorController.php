<?php

namespace App\Modules\Article\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;
use App\Library\Uploader;
use App\Models\User;
use App\Modules\Article\Http\Requests\ArticleAuthorRequest;
use App\Modules\Article\Models\ArticleAuthor;
use App\Modules\Article\Repositories\ArticleAuthorRepository as Repo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Image;

class ArticleAuthorController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'article_author.';
        $this->redirectViewName = 'backend.';
        $this->repo = $repo;
    }

    public function index()
    {
        $records = $this->repo->orderBy('created_at', 'desc')->paginate();
        return view('article::' . $this->getViewName(__FUNCTION__), compact(['records']));
    }


    public function create()
    {
        $record = $this->repo->createModel();
        $userList = User::userList();

        return view('article::' . $this->getViewName(__FUNCTION__), compact(['record', 'userList']));
    }


    public function store(ArticleAuthorRequest $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(ArticleAuthor $record)
    {
        return view('article::' . $this->getViewName(__FUNCTION__), compact('record'));
    }


    public function edit(ArticleAuthor $record)
    {
        $userList = User::userList();
        return view('article::' . $this->getViewName(__FUNCTION__), compact(['record', 'userList']));
    }


    public function update(ArticleAuthorRequest $request, ArticleAuthor $record)
    {
        return $this->save($record);
    }


    public function destroy(ArticleAuthor $record)
    {
        $this->repo->delete($record->id);

        $this->removeCacheTags(['ArticleAuthorController']);
        $this->removeHomePageCache();

        return redirect()->route($this->redirectRouteName . $this->view . 'index');
    }


    public function save($record)
    {
        $input = Input::all();

        $input['is_quotation'] = Input::get('is_quotation') == "on" ? true : false;
        $input['is_cuff'] = Input::get('is_cuff') == "on" ? true : false;
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;


        if (isset($record->id)) {
            $result = $this->repo->update($record->id, $input);
        } else {
            $record = $this->repo->create($input);
            //sluggable slug ın sonuna id koyması için upate ediyoruz.
            $result = $this->repo->update($record->id, $input);
        }

        if ($result) {

            if (!empty($input['photo'])) {

                Uploader::removeDirectory('/images/article_author_images/' . $result->id);

                $document_name = $input['photo']->getClientOriginalName();
                $destination = '/images/article_author_images/' . $result->id . '/original';
                Uploader::fileUpload($result, 'photo', $input['photo'], $destination, $document_name);

                $base_path = public_path('images/article_author_images/' . $result->id . '/original/' . $result->photo);

                Image::make($base_path)
                    ->fit(58, 58)
                    ->save(public_path('images/article_author_images/' . $result->id . '/58x58_' . $document_name));
            }


            $this->removeCacheTags(['ArticleAuthorController']);
            $this->removeHomePageCache();

            Session::flash('flash_message', trans('common.message_model_updated'));
            return Redirect::route($this->redirectRouteName . $this->view . 'index', $result);
        } else {
            return Redirect::back()
                ->withErrors(trans('common.save_failed'))
                ->withInput($input);
        }
    }
}