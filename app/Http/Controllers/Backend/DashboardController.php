<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Contact;
use App\Models\Group;
use App\Models\Menu;
use App\Models\Page;
use App\Models\User;
use Cache;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        $activeUserCount = User::where('status', User::ACTIVE)->get()->count();
        $passiveUserCount = User::where('status', User::PASSIVE)->get()->count();
        //todo farklı statusler de gelmeli. foreach ile dönülebilinir.

        $activeGroupCount = Group::where('is_active', 1)->get()->count();
        $passiveGroupCount = Group::where('is_active', 0)->get()->count();

        $activePageCount = Page::where('is_active', 1)->get()->count();
        $passivePageCount = Page::where('is_active', 0)->get()->count();

        $activeMenuCount = Menu::where('is_active', 1)->get()->count();
        $passiveMenuCount = Menu::where('is_active', 0)->get()->count();


        $passiveContactMessageCount = Contact::where('is_read', 0)->get()->count();

        $activeAdsCount = Advertisement::where('is_active', 1)->get()->count();

        $userGroupsAnnouncements = [];
        if(count(\Auth::user()->groups)) {

            $userGroups = \Auth::user()->groups;
            $userGroupsAnnouncements = $userGroups->map(function ($userGroup) {
                return $userGroup->announcements->where('is_active', 1);
            });
            $userGroupsAnnouncements = $userGroupsAnnouncements[0];
        }

        return view('backend.dashboard.index', compact(
            'activeUserCount',
            'passiveUserCount',
            'activeGroupCount',
            'passiveGroupCount',
            'activePageCount',
            'passivePageCount',
            'activeMenuCount',
            'passiveMenuCount',
            'passiveContactMessageCount',
            'activeAdsCount',
            'userGroupsAnnouncements'
        ));
    }


    /*
     * backend.partials._dashboard_route_list sayfasında bulunan linkleri yetkiye göre listeliyoruz.
     * her defasında sorgulamamak için render la cache liyoruz.
     * */
    public function routeList()
    {
        return Cache::tags(['routeList'])->remember('admin_dashboard_links_user_id_' . Auth::user()->id, 1000, function () {
            return view('backend.partials._dashboard_route_list')->render();
        });

    }

}
