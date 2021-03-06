<?php

namespace App\Modules\Book\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;
use App\Modules\Book\Http\Requests\BookPublisherRequest;
use App\Modules\Book\Models\BookPublisher;
use App\Modules\Book\Repositories\BookPublisherRepository as Repo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class BookPublisherController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'book_publisher.';
        $this->redirectViewName = 'backend.';
        $this->repo = $repo;
    }

    public function index()
    {
        $records = $this->repo->orderBy('created_at', 'desc')->paginate();
        return view('book::' . $this->getViewName(__FUNCTION__), compact(['records']));
    }

    public function create()
    {
        $record = $this->repo->createModel();
        return view('book::' . $this->getViewName(__FUNCTION__), compact(['record']));
    }

    public function store(BookPublisherRequest $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(BookPublisher $record)
    {
        return view('book::' . $this->getViewName(__FUNCTION__), compact(['record']));
    }


    public function edit(BookPublisher $record)
    {
        return view('book::' . $this->getViewName(__FUNCTION__), compact(['record']));
    }

    public function update(BookPublisherRequest $request, BookPublisher $record)
    {
        return $this->save($record);
    }


    public function destroy(BookPublisher $record)
    {
        $this->repo->delete($record->id);

        $this->removeCacheTags(['BookPublisherController']);
        $this->removeHomePageCache();

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

            /*
             * Delete related caches
             * */
            $this->removeCacheTags(['BookPublisherController']);
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
