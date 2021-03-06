<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CountryRequest;
use App\Models\Country;
use App\Repositories\CountryRepository as Repo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class CountryController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'country.';
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


    public function store(CountryRequest $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(Country $record)
    {
        return view($this->getViewName(__FUNCTION__), compact('record'));
    }


    public function edit(Country $record)
    {
        return view($this->getViewName(__FUNCTION__), compact(['record']));
    }


    public function update(CountryRequest $request, Country $record)
    {
        return $this->save($record);
    }


    public function destroy(Country $record)
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
