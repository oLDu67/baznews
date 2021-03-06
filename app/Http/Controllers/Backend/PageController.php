<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\PageRequest;
use App\Http\Requests\SavePage;
use App\Models\Page;
use App\Repositories\PageRepository as Repo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class PageController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'page.';
        $this->redirectViewName = 'backend.';
        $this->repo = $repo;
    }


    public function index()
    {
        $records = $this->repo->orderBy('created_at','desc')->paginate();
        return view($this->getViewName(__FUNCTION__), compact('records'));
    }


    public function create()
    {
        $record = $this->repo->createModel();
        return view($this->getViewName(__FUNCTION__), compact(['record']));
    }


    public function store(PageRequest $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(Page $record)
    {
        return view($this->getViewName(__FUNCTION__), compact('record'));
    }


    public function edit(Page $record)
    {
        return view($this->getViewName(__FUNCTION__), compact(['record']));
    }


    public function update(PageRequest $request, Page $record)
    {
        return $this->save($record);
    }


    public function destroy(Page $record)
    {
        $this->repo->delete($record->id);

        $this->removeCacheTags(['Page']);
        $this->removeHomePageCache();

        return redirect()->route($this->redirectRouteName . $this->view . 'index');
    }


    public function save($record)
    {
        $input = Input::all();

        $input['is_active'] = Input::get('is_active') == "on" ? true : false;
        $input['is_comment'] = Input::get('is_comment') == "on" ? true : false;

        // ckeditor isim benzerliğinden dolayı
        $input['content'] = $input['content_area'];

        /*
            slug alanı unique olduğu için kontrol ediyoruz. Request class ında "required" kontrolü yapmamamızın
            sebebi ise kullanıcı manuel olarak slug girmeye zorunlu olmaması için.
        */
        if(empty(Input::get('slug'))){

            $input['slug'] = str_slug(Input::get('name'));
            $isAvailable = $this->repo->where('slug',$input['slug'])->findFirst();

            if(!empty($isAvailable)){

                return Redirect::back()
                    ->withErrors(trans('common.record_is_available'))
                    ->withInput($input);
            }
        }


        if (isset($record->id)) {
            $result = $this->repo->update($record->id, $input);
        } else {
            $result = $this->repo->create($input);
        }

        if ($result) {

            $this->removeCacheTags(['Page']);
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
