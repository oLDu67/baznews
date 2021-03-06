<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\MenuRequest;
use App\Models\Link;
use App\Models\Menu;
use App\Models\Page;
use App\Repositories\MenuRepository as Repo;
use Cache;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class MenuController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'menu.';
        $this->redirectViewName = 'backend.';
        $this->repo = $repo;
    }


    public function index()
    {
        $records = $this->repo->orderBy('order', 'asc')->paginate();
        $recordsTree = Menu::get()->toTree();
        $recordsTreeJson = Menu::get()->toTree();

        return view($this->getViewName(__FUNCTION__), compact(
            'records',
            'recordsTree',
            'recordsTreeJson'
        ));
    }


    public function create()
    {
        $record = $this->repo->createModel();
        $menuList = Menu::menuList();
        $pageList = Page::pageList();
        $linkList = Link::getLinksWithType();

        return view($this->getViewName(__FUNCTION__), compact(['record', 'menuList', 'pageList', 'linkList']));
    }


    public function store(MenuRequest $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(Menu $record)
    {
        return view($this->getViewName(__FUNCTION__), compact('record'));
    }


    public function edit(Menu $record)
    {
        $menuList = Menu::menuList();
        $pageList = Page::pageList();
        $linkList = Link::getLinksWithType();

        return view($this->getViewName(__FUNCTION__), compact(['record', 'menuList', 'pageList', 'linkList']));
    }


    public function update(MenuRequest $request, Menu $record)
    {
        return $this->save($record);
    }


    public function destroy(Menu $record)
    {
        $this->repo->delete($record->id);

        $this->removeHomePageCache();

        return redirect()->route($this->redirectRouteName . $this->view . 'index');
    }


    public function save($record)
    {
        $input = Input::all();
        $input['is_header'] = Input::get('is_header') == "on" ? true : false;
        $input['is_footer'] = Input::get('is_footer') == "on" ? true : false;
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;

        if (isset($record->id)) {
            $result = $this->repo->update($record->id, $input);
        } else {
            $result = $this->repo->create($input);
        }

        if ($result) {

            Cache::tags(['Setting', 'Menu'])->flush();
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
