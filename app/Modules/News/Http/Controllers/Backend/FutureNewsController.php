<?php

namespace App\Modules\News\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;
use App\Modules\News\Http\Requests\FutureNewsRequest;
use App\Modules\News\Models\FutureNews;
use App\Modules\News\Models\News;
use App\Modules\News\Repositories\FutureNewsRepository as Repo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;


class FutureNewsController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'future_news.';
        $this->redirectViewName = 'backend.';
        $this->repo = $repo;
    }


    public function index()
    {
        $records = $this->repo->orderBy('created_at', 'desc')->paginate();
        return view('news::' . $this->getViewName(__FUNCTION__), compact(['records']));
    }


    public function create()
    {
        $newsAllList = News::newsAllList();
        $record = $this->repo->createModel();
        return view('news::' . $this->getViewName(__FUNCTION__), compact(['record', 'newsAllList']));
    }


    public function store(FutureNewsRequest $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(FutureNews $record)
    {
        return view('news::' . $this->getViewName(__FUNCTION__), compact('record'));
    }


    public function edit(FutureNews $record)
    {
        $newsAllList = News::newsAllList();
        return view('news::' . $this->getViewName(__FUNCTION__), compact(['record', 'newsAllList']));
    }


    public function update(FutureNewsRequest $request, FutureNews $record)
    {
        return $this->save($record);
    }


    public function destroy(FutureNews $record)
    {
        $this->repo->delete($record->id);
        return redirect()->route($this->redirectRouteName . $this->view . 'index');
    }


    public function save($record)
    {
        $input = Input::all();
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;

        if (isset($record->id)) {
            $result = $this->repo->update($record->id, $input);
        } else {
            $result = $this->repo->create($input);
        }

        if ($result) {
            Session::flash('flash_message', trans('common.message_model_updated'));
            return Redirect::route($this->redirectRouteName . $this->view . 'index', $result);
        } else {
            return Redirect::back()
                ->withErrors(trans('common.save_failed'))
                ->withInput($input);
        }
    }
}
