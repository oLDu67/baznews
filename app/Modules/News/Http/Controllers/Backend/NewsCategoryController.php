<?php

namespace App\Modules\News\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;
use App\Modules\News\Http\Requests\NewsCategoryRequest;
use App\Modules\News\Models\NewsCategory;
use App\Modules\News\Repositories\NewsCategoryRepository as Repo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;


class NewsCategoryController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'news_category.';
        $this->redirectViewName = 'backend.';
        $this->repo = $repo;
    }


    public function index()
    {
        $records = $this->repo->orderBy('created_at', 'desc')->paginate();
        $recordsTree = NewsCategory::get()->toTree();

        return view('news::' . $this->getViewName(__FUNCTION__), compact(['records', 'recordsTree']));
    }


    public function create()
    {
        $newsCategoryList = NewsCategory::newsCategoryList();
        $record = $this->repo->createModel();
        return view('news::' . $this->getViewName(__FUNCTION__), compact(['record', 'newsCategoryList']));
    }


    public function store(NewsCategoryRequest $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(NewsCategory $record)
    {
        return view('news::' . $this->getViewName(__FUNCTION__), compact('record'));
    }


    public function edit(NewsCategory $record)
    {
        $newsCategoryList = NewsCategory::newsCategoryList();
        return view('news::' . $this->getViewName(__FUNCTION__), compact(['record', 'newsCategoryList']));
    }


    public function update(NewsCategoryRequest $request, NewsCategory $record)
    {
        return $this->save($record);
    }


    public function destroy(NewsCategory $record)
    {
        $this->repo->delete($record->id);

        $this->removeCacheTags(['NewsCategoryController', 'News']);
        $this->removeHomePageCache();

        return redirect()->route($this->redirectRouteName . $this->view . 'index');
    }


    public function save($record)
    {
        $input = Input::all();
        $input['is_cuff'] = Input::get('is_cuff') == "on" ? true : false;
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;

        if (isset($record->id)) {
            $result = $this->repo->update($record->id, $input);
        } else {
            $result = $this->repo->create($input);
        }

        if ($result) {

            $this->removeCacheTags(['NewsCategoryController', 'News']);
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
