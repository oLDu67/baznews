<?php

namespace App\Modules\Book\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Modules\Book\Models\BookPublisher;
use App\Modules\Book\Repositories\BookPublisherRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class BookPublisherController extends Controller
{
    private $repo;
    private $view = 'book_publisher.';
    private $redirectViewName = 'backend.';
    private $redirectRouteName = '';

    public function __construct(Repo $repo)
    {
        $this->middleware(function ($request, $next) {

            $this->permisson_check();

            return $next($request);
        });

        $this->repo= $repo;
    }

    public function getViewName($methodName)
    {
        return $this->redirectViewName . $this->view . $methodName;
    }

    public function index()
    {
        $records = $this->repo->orderBy('updated_at', 'desc')->findAll();
        return Theme::view('book::' . $this->getViewName(__FUNCTION__),compact(['records']));
    }

    public function create()
    {
        $record = $this->repo->createModel();
        return Theme::view('book::' . $this->getViewName(__FUNCTION__),compact(['record']));
    }

    public function store(Request $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(BookPublisher $record)
    {
        return Theme::view('book::' . $this->getViewName(__FUNCTION__),compact(['records']));
    }


    public function edit(BookPublisher $record)
    {
        return Theme::view('book::' . $this->getViewName(__FUNCTION__),compact(['record']));
    }

    public function update(Request $request, BookPublisher $record)
    {
        return $this->save($record);
    }


    public function destroy(BookPublisher $record)
    {
        $this->repo->delete($record->id);
        return redirect()->route($this->redirectRouteName . $this->view .'index');
    }


    public function save($record)
    {
        $input = Input::all();

        $input['is_active'] = Input::get('is_active') == "on" ? true : false;
        $input['user_id'] = \Auth::user()->id;

        $v = BookPublisher::validate($input);

        if ($v->fails()) {
            return Redirect::back()
                ->withErrors($v)
                ->withInput($input);
        } else {

            if (isset($record->id)) {
                $result = $this->repo->update($record->id,$input);
            } else {
                $result = $this->repo->create($input);
            }
            if ($result[0]) {

                Session::flash('flash_message', trans('common.message_model_updated'));
                return Redirect::route($this->redirectRouteName . $this->view . 'index', $record);
            } else {
                return Redirect::back()
                    ->withErrors(trans('common.save_failed'))
                    ->withInput($input);
            }
        }
    }
}