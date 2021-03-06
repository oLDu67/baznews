<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\ModuleManagerRequest;
use App\Models\ModuleManager;
use App\Models\SearchList;
use App\Repositories\ModuleManagerRepository as Repo;
use App\Repositories\WidgetManagerRepository;
use Caffeinated\Modules\Facades\Module;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;


class ModuleManagerController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'module_manager.';
        $this->redirectViewName = 'backend.';
        $this->repo = $repo;
    }

    public function index()
    {
        $modules = Module::all();
        $moduleCount = Module::count();

        $records = $this->repo->paginate();
        return view($this->getViewName(__FUNCTION__), compact(
            'records',
            'moduleCount',
            'modules'
        ));
    }

    public function create()
    {
        $record = $this->repo->createModel();
        return view($this->getViewName(__FUNCTION__), compact(['record']));
    }


    public function store(ModuleManagerRequest $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(ModuleManager $record)
    {
        return view($this->getViewName(__FUNCTION__), compact('record'));
    }


    public function edit(ModuleManager $record)
    {
        return view($this->getViewName(__FUNCTION__), compact(['record']));
    }


    public function update(ModuleManagerRequest $request, ModuleManager $record)
    {
        return $this->save($record);
    }


    public function destroy(ModuleManager $record)
    {
        $this->repo->delete($record->id);

        $this->flushAll();

        return redirect()->route($this->redirectRouteName . $this->view . 'index');
    }


    public function save($record)
    {
        $input = Input::all();
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;

        $v = ModuleManager::validate($input);

        if ($v->fails()) {
            return Redirect::back()
                ->withErrors($v)
                ->withInput($input);
        } else {

            if (isset($record->id)) {
                list($status, $instance) = $this->repo->update($record->id, $input);
            } else {
                list($status, $instance) = $this->repo->create($input);
            }

            if ($status) {

                $this->flushAll();

                Session::flash('flash_message', trans('common.message_model_updated'));
                return Redirect::route($this->redirectRouteName . $this->view . 'index', $status);
            } else {
                return Redirect::back()
                    ->withErrors(trans('common.save_failed'))
                    ->withInput($input);
            }
        }
    }

    public function moduleActivationToggle($moduleSlug)
    {
        if (Module::isEnabled($moduleSlug)) {

            /*
             * Module disable yapıldığında aktif olan widgetlarını da pasif hale getiriyoruz.
             * */
            $this->repo->setPassiveModeOfModelWidgets($moduleSlug);

            Module::disable($moduleSlug);

            $this->toggleSearchListOfModule($moduleSlug);

        } else {
            Module::enable($moduleSlug);

            $this->toggleSearchListOfModule($moduleSlug, true);
        }

        $this->flushAll();

        return Redirect::back();
    }


    public function moduleReset($moduleSlug)
    {
        Artisan::call('module:migrate:reset', [
            'slug' => $moduleSlug,
            '--force' => true,
        ]);

        $module = Module::where('slug', $moduleSlug)->toArray();

        $this->widgetDeleteByModuleName($module['name']);
        $this->moduleActivationToggle($moduleSlug);

        $this->flushAll();
        return Redirect::back();
    }


    public function moduleRefreshAndSeed($moduleSlug)
    {

        Artisan::call('module:migrate:reset', [
            'slug' => $moduleSlug,
            '--force' => true,
        ]);


        Artisan::call('module:migrate', [
            'slug' => $moduleSlug,
            '--force' => true,
        ]);

        Artisan::call('module:seed', [
            'slug' => $moduleSlug,
            '--force' => true,
        ]);

        $this->moduleActivationToggle($moduleSlug);

        $this->flushAll();

        return Redirect::back();
    }


    /**
     * Bu model de soft delete kullanıdğımız için forceDelete methodu ile tamammen siliyoruz.
     *
     * @param $moduleName
     * @return bool
     */
    public function widgetDeleteByModuleName($moduleName)
    {
        $widgetManagerRepo = new WidgetManagerRepository();
        $widget = $widgetManagerRepo->findBy('module_name', $moduleName);

        if (isset($widget)){

            $widget->forceDelete();
            return true;
        }

        return false;
    }


    /**
     * @param $moduleSlug
     * @param bool $mode
     */
    public function toggleSearchListOfModule($moduleSlug, $mode = false)
    {
        SearchList::where('module_slug', $moduleSlug)->update(['is_active' => $mode]);
    }
}
