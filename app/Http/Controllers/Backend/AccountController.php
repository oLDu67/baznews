<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\City;
use App\Models\Country;
use App\Models\Event;
use App\Models\Group;
use App\Models\Role;
use App\Repositories\AccountRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class AccountController extends Controller
{
    private $repo;
    private $view = 'account.';
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

    public function show(Account $record)
    {
        $revisions = $record->getUserRevisions($record->id);
        $events = Event::where('user_id',$record->id)->get();

        return Theme::view($this->getViewName(__FUNCTION__),compact('record','revisions', 'events'));
    }


    public function edit(Account $record)
    {
        $countries = Country::countryList();
        $cities = City::cityList();
        $roles = Role::roleList();
        $groups = Group::groupList();

        return Theme::view($this->getViewName(__FUNCTION__),compact(['record','countries' ,'cities', 'roles', 'groups']));
    }


    public function update(Request $request, Account $record)
    {
        return $this->save($record);
    }

    public function save($record)
    {
        $input = Input::all();

        $result = null;

        $v = Account::validate($input);

        if ($v->fails()) {
            return Redirect::back()
                ->withErrors($v)
                ->withInput($input);
        } else {

            if (isset($record->id)) {
                $result = $this->repo->update($record->id,$input);
            }

            if ($result) {
                Session::flash('flash_message', trans('common.message_model_updated'));
                return Redirect::route($this->redirectRouteName . $this->view . 'show', $record);
            } else {
                return Redirect::back()
                    ->withErrors(trans('common.save_failed'))
                    ->withInput($input);
            }
        }
    }
}
