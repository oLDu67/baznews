<?php

namespace App\Http\Controllers\Backend;

use App\Jobs\BackUp\BackUpClean;
use App\Jobs\BackUp\GetBackUp;
use App\Jobs\DB\RepairMysqlTables;
use App\Library\Uploader;
use App\Models\City;
use App\Models\Country;
use App\Models\Group;
use App\Models\Language;
use App\Models\Role;
use App\Models\Setting;
use App\Repositories\SettingRepository as Repo;
use Caffeinated\Modules\Facades\Module;
use Caffeinated\Themes\Facades\Theme;
use DateTimeZone;
use Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class SettingController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'setting.';
        $this->redirectViewName = 'backend.';
        $this->repo = $repo;
    }

    public function index()
    {
        /*
         * todo Route::getRoutes() methodunu kullanarak
         * https://github.com/garygreen/pretty-routes
         * gibi özellikler kayılabilinir.
         */
        $timezoneList = [];
        $records = $this->repo->findAll();
        $languageList = Language::languageList();
        $countryList = Country::countryList();
        $cityList = City::cityList();
        $routeCollection = Route::getRoutes();
        $themes = Theme::all();
        $activeTheme = Theme::getCurrent();
        $modules = Module::all();
        $modulesCount = Module::count();
        $roleList = Role::roleList();
        $groupList = Group::groupList();

        //SelectBox içerisinde value değerinin seçilebilmesi için key yerine value değerini atıyoruz.
        foreach (DateTimeZone::listIdentifiers() as $key => $value) $timezoneList[$value] = $value;

        $logo = $this->repo->findBy('attribute_key', 'logo');
        $favicon = $this->repo->findBy('attribute_key', 'favicon');

        return view($this->getViewName(__FUNCTION__),
            compact(
                'records',
                'languageList',
                'countryList',
                'cityList',
                'routeCollection',
                'themes',
                'activeTheme',
                'modules',
                'modulesCount',
                'timezoneList',
                'logo',
                'favicon',
                'roleList',
                'groupList'
            ));
    }


    public function create()
    {
        $record = $this->repo->createModel();
        return view($this->getViewName(__FUNCTION__), compact(['record']));
    }


    public function store(Request $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(Setting $record)
    {
        return view($this->getViewName(__FUNCTION__), compact('record'));
    }


    public function edit(Setting $record)
    {
        return view($this->getViewName(__FUNCTION__), compact(['record', 'routeCollection']));
    }


    public function update(Request $request, Setting $record)
    {
        return $this->save($record);
    }


    public function destroy(Setting $record)
    {
        $this->repo->delete($record->id);
        return redirect()->route($this->redirectRouteName . $this->view . 'index');
    }


    public function save($record)
    {
        $input = Input::all();

        $v = Setting::validate($input);

        if ($v->fails()) {
            return Redirect::back()
                ->withErrors($v)
                ->withInput($input);
        }

        if (!empty($input['country_id']) || $input['country_id'] == null){
            $record = $this->repo->findBy('attribute_key', 'country');
            $this->repo->update($record->id, ['attribute_value' => $input['country_id']]);
        }

        if (!empty($input['city_id']) || $input['city_id'] == null){
            $record = $this->repo->findBy('attribute_key', 'city');
            $this->repo->update($record->id, ['attribute_value' => $input['city_id']]);
        }

        if (!empty($input['language_code']) || $input['language_code'] == null){
            $record = $this->repo->findBy('attribute_key', 'language_code');
            $this->repo->update($record->id, ['attribute_value' => $input['language_code']]);
        }

        if (!empty($input['title'])  || $input['title'] == null){
            $record = $this->repo->findBy('attribute_key', 'title');
            $this->repo->update($record->id, ['attribute_value' => $input['title']]);
        }

        if (!empty($input['slogan']) || $input['slogan'] == null) {
            $record = $this->repo->findBy('attribute_key', 'slogan');
            $this->repo->update($record->id, ['attribute_value' => $input['slogan']]);
        }

        if (!empty($input['description']) || $input['description'] == null) {
            $record = $this->repo->findBy('attribute_key', 'description');
            $this->repo->update($record->id, ['attribute_value' => $input['description']]);
        }

        if (!empty($input['keywords']) || $input['keywords'] == null) {
            $record = $this->repo->findBy('attribute_key', 'keywords');
            $this->repo->update($record->id, ['attribute_value' => $input['keywords']]);
        }

        if (!empty($input['logo'])) {
            Uploader::logoUploader($input['logo']);
        }

        if (!empty($input['favicon'])) {
            Uploader::faviconUploader($input['favicon']);
        }

        if (!empty($input['abstract_text']) || $input['abstract_text'] == null) {
            $record = $this->repo->findBy('attribute_key', 'abstract_text');
            $this->repo->update($record->id, ['attribute_value' => $input['abstract_text']]);
        }

        if (!empty($input['footer_text'])  || $input['footer_text'] == null) {
            $record = $this->repo->findBy('attribute_key', 'footer_text');
            $this->repo->update($record->id, ['attribute_value' => $input['footer_text']]);
        }

        if (!empty($input['contact']) || $input['contact'] == null) {
            $record = $this->repo->findBy('attribute_key', 'contact');
            $this->repo->update($record->id, ['attribute_value' => $input['contact']]);
        }

        if (!empty($input['longitude']) || $input['longitude'] == null) {
            $record = $this->repo->findBy('attribute_key', 'longitude');
            $this->repo->update($record->id, ['attribute_value' => $input['longitude']]);
        }

        if (!empty($input['latitude']) || $input['latitude'] == null) {
            $record = $this->repo->findBy('attribute_key', 'latitude');
            $this->repo->update($record->id, ['attribute_value' => $input['latitude']]);
        }

        if (!empty($input['copyright'])  || $input['copyright'] == null) {
            $record = $this->repo->findBy('attribute_key', 'copyright');
            $this->repo->update($record->id, ['attribute_value' => $input['copyright']]);
        }

        $record = $this->repo->findBy('attribute_key', 'user_contract_force');
        if (!empty($input['user_contract_force'])) {
            $this->repo->update($record->id, ['attribute_value' => 1 ]);
        }else{
            $this->repo->update($record->id, ['attribute_value' => 0 ]);
        }

        // public değeri "0" olduğu için empty methodu yerine özellikle isset methodunu kullanıyoruz.
        if (isset($input['user_registration_type'])) {
            $record = $this->repo->findBy('attribute_key', 'user_registration_type');
            $this->repo->update($record->id, ['attribute_value' => $input['user_registration_type']]);
        }

        if (!empty($input['user_contract'])  || $input['user_contract'] == null) {
            $record = $this->repo->findBy('attribute_key', 'user_contract');
            $this->repo->update($record->id, ['attribute_value' => $input['user_contract']]);
        }

        if (!empty($input['user_default_role'])) {
            $record = $this->repo->findBy('attribute_key', 'user_default_role');
            $this->repo->update($record->id, ['attribute_value' => $input['user_default_role']]);
        }

        if (!empty($input['url']) || $input['url'] == null) {
            $record = $this->repo->findBy('attribute_key', 'url');
            $this->repo->update($record->id, ['attribute_value' => $input['url']]);
        }

        if (!empty($input['google_recaptcha_site_key']) || $input['google_recaptcha_site_key'] == null) {
            $record = $this->repo->findBy('attribute_key', 'google_recaptcha_site_key');
            $this->repo->update($record->id, ['attribute_value' => $input['google_recaptcha_site_key']]);
        }

        if (!empty($input['google_recaptcha_secret_key']) || $input['google_recaptcha_secret_key'] == null) {
            $record = $this->repo->findBy('attribute_key', 'google_recaptcha_secret_key');
            $this->repo->update($record->id, ['attribute_value' => $input['google_recaptcha_secret_key']]);
        }

        if (!empty($input['google_url_shortener_key']) || $input['google_url_shortener_key'] == null) {
            $record = $this->repo->findBy('attribute_key', 'google_url_shortener_key');
            $this->repo->update($record->id, ['attribute_value' => $input['google_url_shortener_key']]);
        }

        if (!empty($input['head_code']) || $input['head_code'] == null ) {
            $record = $this->repo->findBy('attribute_key', 'head_code');
            $this->repo->update($record->id, ['attribute_value' => $input['head_code']]);
        }

        if (!empty($input['footer_code']) || $input['footer_code'] == null) {
            $record = $this->repo->findBy('attribute_key', 'footer_code');
            $this->repo->update($record->id, ['attribute_value' => $input['footer_code']]);
        }

        if (!empty($input['timezone']) || $input['timezone'] == null) {
            $record = $this->repo->findBy('attribute_key', 'timezone');
            $this->repo->update($record->id, ['attribute_value' => $input['timezone']]);
        }

        if (!empty($input['facebook']) || $input['facebook'] == null) {
            $record = $this->repo->findBy('attribute_key', 'facebook');
            $this->repo->update($record->id, ['attribute_value' => $input['facebook']]);
        }

        if (!empty($input['facebook_embed_code']) || $input['facebook_embed_code'] == null) {
            $record = $this->repo->findBy('attribute_key', 'facebook_embed_code');
            $this->repo->update($record->id, ['attribute_value' => $input['facebook_embed_code']]);
        }

        if (!empty($input['twitter']) || $input['twitter'] == null) {
            $record = $this->repo->findBy('attribute_key', 'twitter');
            $this->repo->update($record->id, ['attribute_value' => $input['twitter']]);
        }

        if (!empty($input['twitter_embed_code']) || $input['twitter_embed_code'] == null) {
            $record = $this->repo->findBy('attribute_key', 'twitter_embed_code');
            $this->repo->update($record->id, ['attribute_value' => $input['twitter_embed_code']]);
        }

        if (!empty($input['instagram']) || $input['instagram'] == null) {
            $record = $this->repo->findBy('attribute_key', 'instagram');
            $this->repo->update($record->id, ['attribute_value' => $input['instagram']]);
        }

        if (!empty($input['instagram_embed_code']) || $input['instagram_embed_code'] == null) {
            $record = $this->repo->findBy('attribute_key', 'instagram_embed_code');
            $this->repo->update($record->id, ['attribute_value' => $input['instagram_embed_code']]);
        }

        if (!empty($input['pinterest']) || $input['pinterest'] == null) {
            $record = $this->repo->findBy('attribute_key', 'pinterest');
            $this->repo->update($record->id, ['attribute_value' => $input['pinterest']]);
        }

        if (!empty($input['pinterest_embed_code'])  || $input['pinterest_embed_code'] == null) {
            $record = $this->repo->findBy('attribute_key', 'pinterest_embed_code');
            $this->repo->update($record->id, ['attribute_value' => $input['pinterest_embed_code']]);
        }

        if (!empty($input['weather_embed_code'])  || $input['weather_embed_code'] == null) {
            $record = $this->repo->findBy('attribute_key', 'weather_embed_code');
            $this->repo->update($record->id, ['attribute_value' => $input['weather_embed_code']]);
        }

        if (!empty($input['addthis'])   || $input['addthis'] == null) {
            $record = $this->repo->findBy('attribute_key', 'addthis');
            $this->repo->update($record->id, ['attribute_value' => $input['addthis']]);
        }

        if (!empty($input['disqus'])  || $input['disqus'] == null) {
            $record = $this->repo->findBy('attribute_key', 'disqus');
            $this->repo->update($record->id, ['attribute_value' => $input['disqus']]);
        }

        if (!empty($input['sitemap_count'])) {
            $record = $this->repo->findBy('attribute_key', 'sitemap_count');
            $this->repo->update($record->id, ['attribute_value' => $input['sitemap_count']]);
        }

        if (!empty($input['is_url_shortener'])) {
            $record = $this->repo->findBy('attribute_key', 'is_url_shortener');
            $this->repo->update($record->id, ['attribute_value' => $input['is_url_shortener']]);
        }

        if (!empty($input['allow_photo_formats'])) {
            $record = $this->repo->findBy('attribute_key', 'allow_photo_formats');
            $this->repo->update($record->id, ['attribute_value' => $input['allow_photo_formats']]);
        }

        if (!empty($input['allow_video_formats'])) {
            $record = $this->repo->findBy('attribute_key', 'allow_video_formats');
            $this->repo->update($record->id, ['attribute_value' => $input['allow_video_formats']]);
        }

        $this->flushAll();

        Session::flash('flash_message', trans('common.message_model_updated'));
        return Redirect::route($this->redirectRouteName . $this->view . 'index');
    }


    public function repairMysqlTables()
    {
        dispatch_now(new RepairMysqlTables());

        Log::info('Database table repaired.');
        Session::flash('flash_message', trans('setting.repair_mysql_tables'));

        return Redirect::back();
    }


    public function flushAllCache()
    {
//        $this->dispatch(new FlushAllCache());

        Redis::flushall();
        Cache::flush();

        Log::info('Caches deleted');
        Session::flash('flash_message', trans('setting.flush_all_cache'));
        return Redirect::back();
    }

    public function flushCacheItem($cacheItem)
    {
        $this->removeCacheKey($cacheItem);
        Log::info('Caches deleted');
        Session::flash('flash_message', trans('setting.flush_cache_item') . '   ' . $cacheItem);
        return Redirect::back();
    }


    public function getAllRedisKey()
    {
        $redisKeys = Redis::keys('*');

        return view($this->getViewName(__FUNCTION__), compact(['redisKeys']));
    }


    public function deleteCacheByContent($content)
    {
        $laravelCaches = Redis::keys('*' . $content . '*');

        foreach ($laravelCaches as $laravelCache) {
            Redis::del($laravelCache);
        }
    }


    public function getBackUp()
    {
        dispatch_now(new GetBackUp());

        Log::info('Backup received.');
        Session::flash('flash_message', trans('setting.backup_received'));

        return Redirect::back();
    }


    public function backUpClean()
    {
        dispatch_now(new BackUpClean());

        Log::info('Backup cleaned.');
        Session::flash('flash_message', trans('setting.backup_cleaned'));

        return Redirect::back();
    }


    /**
     *
     * route:cache işlemi yapıldığında bu hatayı alıyoruz.
     * Unable to prepare route [laravel-filemanager/demo] for serialization. Uses Closure.
     *
     * Route lar da clouse yapı kullanıldığı için
     * https://github.com/laravel/framework/issues/7319#issuecomment-73362932
     *
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function routeCache()
    {
        \Artisan::call('route:cache');

        Log::info(trans('setting.route_cached'));
        Session::flash('flash_message', trans('setting.route_cached'));

        return Redirect::back();
    }


    public function routeClear()
    {
        \Artisan::call('route:clear');

        Log::info(trans('setting.route_cleared'));
        Session::flash('flash_message', trans('setting.route_cleared'));

        return Redirect::back();
    }


    public function viewClear()
    {
        \Artisan::call('view:clear');

        Log::info(trans('setting.view_cleared'));
        Session::flash('flash_message', trans('setting.view_cleared'));

        return Redirect::back();
    }


    public function configClear()
    {
        \Artisan::call('config:clear');

        Log::info(trans('setting.config_cleared'));
        Session::flash('flash_message', trans('setting.config_cleared'));

        return Redirect::back();
    }


    public function configCache()
    {
        \Artisan::call('config:cache');

        Log::info(trans('setting.config_cache'));
        Session::flash('flash_message', trans('setting.config_cache'));

        return Redirect::back();
    }
}
