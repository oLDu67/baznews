<?php

namespace App\Http\Controllers\Backend;

use App\Models\Announcement;
use App\Repositories\AnnouncementRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class AnnouncementController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'announcement.';
        $this->redirectViewName = 'backend.';
        $this->repo= $repo;
    }

    public function index()
    {
        $announcement_list = null;
        $user_groups = Auth::user()->groups;
        /*
         * Kullanıcının bulunduğu grupları alıyoruz sonrasında bu gruplara
         * bağlı olan dokümanları alıyoruz.
         */

        foreach($user_groups as $group){
            foreach ($group->announcements as $announcement){
                $announcement_list =  $announcement_list . '/'.  $announcement->id;
            }
        }

        $records = explode("/",$announcement_list);

        $announcements = Announcement::whereIn('id', array_unique($records))
            ->where('is_active',1)
            ->where(function($query)
            {
                $query->where('show_time', '>=', Carbon::now());
            })
            ->orderBy('updated_at','desc')
            ->get();

        $records = $this->repo->findAll();
        return Theme::view($this->getViewName(__FUNCTION__),compact('records','announcements'));
    }


    public function create()
    {
        $groupList =  Auth::user()->groups;
        $record = $this->repo->createModel();
        return Theme::view($this->getViewName(__FUNCTION__),compact(['record', 'groupList']));
    }


    public function store(Request $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(Announcement $record)
    {
        $groupList =  Auth::user()->groups;
        $record = $this->repo->createModel();
        return Theme::view($this->getViewName(__FUNCTION__),compact(['record', 'groupList']));
    }


    public function edit(Announcement $record)
    {
        $groupList =  Auth::user()->groups;

        return Theme::view($this->getViewName(__FUNCTION__),compact(['record', 'groupList']));
    }


    public function update(Request $request, Announcement $record)
    {
        return $this->save($record);
    }


    public function destroy(Announcement $record)
    {
        $this->repo->delete($record->id);
        return redirect()->route($this->redirectRouteName . $this->view .'index');
    }


    public function save($record)
    {
        $input = Input::all();
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;

        $v = Announcement::validate($input);

        if ($v->fails()) {
            return Redirect::back()
                ->withErrors($v)
                ->withInput($input);
        } else {

            if (isset($record->id)) {
                list($status, $instance) = $this->repo->update($record->id,$input);
            } else {
                list($status, $instance) = $this->repo->create($input);
            }

            if ($status) {
                Session::flash('flash_message', trans('common.message_model_updated'));
                return Redirect::route($this->redirectRouteName . $this->view . 'index', $instance);
            } else {
                return Redirect::back()
                    ->withErrors(trans('common.save_failed'))
                    ->withInput($input);
            }
        }
    }

    public function announcement_group_store(Request $request)
    {
        $input = Input::all();
        $announcement_id = $input['announcement_id'];

        unset($input['announcement_id']);
        unset($input['_token']);

        if(count($input) < 1){
            return Redirect::back();
            //TODO HATA MESAJI VERİLECEK
        }

        $announcement = Announcement::find($announcement_id);
        $announcement->groups()->sync($input);

        return Redirect::back();
    }


    public function announcement_list()
    {
        $announcement_list = null;
        $user_groups = Auth::user()->groups;
        /*
         * Kullanıcının bulunduğu grupları alıyoruz sonrasında bu gruplara
         * bağlı olan dokümanları alıyoruz.
         */

        foreach($user_groups as $group){
            foreach ($group->announcements as $announcement){
                $announcement_list =  $announcement_list . '/'.  $announcement->id;
            }
        }

        $records = explode("/",$announcement_list);

        $announcements = Announcement::whereIn('id', array_unique($records))
            ->where('is_active',1)
            ->orderBy('updated_at','desc')
            ->get();

        return view('backend.announcement.list')
            ->with('records', $announcements);
    }

}
