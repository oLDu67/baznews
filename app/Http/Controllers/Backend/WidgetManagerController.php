<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\WidgetManager;
use App\Repositories\WidgetManagerRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class WidgetManagerController extends Controller
{
    private $repo;
    private $view = 'widget_manager.';
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
        $records = $this->repo->findAll();

        $widgets = WidgetManager::getEnableModuleWidgets();

        return Theme::view($this->getViewName(__FUNCTION__),compact('records', 'widgets'));
    }


    public function create()
    {
        $record = $this->repo->createModel();

        $widgetGroups = WidgetManager::$widgetGroups;

        return Theme::view($this->getViewName(__FUNCTION__),compact(['record', 'widgetGroups']));
    }


    public function store(Request $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(WidgetManager $record)
    {
        return Theme::view($this->getViewName(__FUNCTION__),compact('record'));
    }


    public function edit(WidgetManager $record)
    {
        $widgetGroups = WidgetManager::$widgetGroups;

        return Theme::view($this->getViewName(__FUNCTION__),compact(['record', 'widgetGroups']));
    }


    public function update(Request $request, WidgetManager $record)
    {
        return $this->save($record);
    }


    public function destroy(WidgetManager $record)
    {
        $this->repo->delete($record->id);
        return redirect()->route($this->redirectRouteName . $this->view .'index');
    }


    public function save($record)
    {
        $input = Input::all();
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;

        $v = WidgetManager::validate($input);

        if ($v->fails()) {
            return Redirect::back()
                ->withErrors($v)
                ->withInput($input);
        } else {

            if (isset($record->id)) {
                $result = $this->repo->update($record->id,$input);
            } else {
                $result = $this->repo->create($input);
                if (!empty($result)) {
                    $result = true;
                }
            }
            if ($result) {
                Session::flash('flash_message', trans('common.message_model_updated'));
                return Redirect::route($this->redirectRouteName . $this->view . 'index', $record);
            } else {
                return Redirect::back()
                    ->withErrors(trans('common.save_failed'))
                    ->withInput($input);
            }
        }
    }


    public function addWidgetActivation($widgetSlug)
    {
        $widget = WidgetManager::getWidgetInfo($widgetSlug);

        $widgetManagaer =[];
        $widgetManagaer['name']     = $widget['name'];
        $widgetManagaer['slug']       = $widget['slug'];
        $widgetManagaer['namespace']  = $widget['namespace'];
        $widgetManagaer['position']   = 1;
        $widgetManagaer['group']      = 'right_bar';
        $widgetManagaer['is_active']  = 1;

        $record = $this->repo->findBy('slug',$widgetSlug);

        if(isset($record->id)) {
            return Redirect::back()
                ->withErrors(trans('widget.widget_is_exists'));
        }else{
            $this->repo->create($widgetManagaer);
        }

        return Redirect::back();
    }

}
