<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::pattern('id', '[0-9]+');
Route::pattern('slug', '[a-z0-9-]+');

Route::get('/', 'Frontend\IndexController@index')->name('index');
Route::get('page/{slug}', 'Frontend\PageController@show')->name('page');
Route::get('/activate/token/{token}', 'Auth\ActivationController@activate')->name('auth.activate');
Route::get('/activate/resend', 'Auth\ActivationController@resend')->name('auth.activate.resend');
Route::get('/login/{service}', 'Auth\SocialLoginController@redirect');
Route::get('/login/{service}/callback', 'Auth\SocialLoginController@callback');
Route::get('sitemap.xml', 'Frontend\SitemapController@sitemaps')->name('sitemaps');
Route::get('rss.xml', 'Frontend\RssController@rssRender')->name('rss');
Route::get('/tags/{q}', 'Frontend\SearchController@tagSearch')->name('tag_search');
Route::get('contact', 'Frontend\ContactController@index')->name('contact-index');
Route::post('contact', 'Frontend\ContactController@store')->name('contact-store');
Route::post('search', 'Frontend\SearchController@index')->name('search');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('account.change_password_view', 'Frontend\AccountController@changePasswordView')->name('change_password_view');
    Route::post('account.change_password', 'Frontend\AccountController@changePassword')->name('change_password');
    Route::resource('account', 'Frontend\AccountController', ['only' => [
        'index', 'edit', 'update'
    ]]);
});



Route::group(['prefix' => 'admin', 'middleware' => 'checkperm'], function() {


    Route::get('/', 'Backend\DashboardController@index')->name('dashboard');
    Route::get('index', 'Backend\DashboardController@index');
    Route::get('dashboard', 'Backend\DashboardController@index');
    Route::get('user/trashedUserRestore/{trashedRecord}', 'Backend\UserController@trashedUserRestore')->name('trashedUserRestore');
    Route::get('user/showTrashedRecords', 'Backend\UserController@showTrashedRecords')->name('showTrashedUserRecords');
    Route::delete('user.historyForceDelete/{historyForceDeleteRecordId}', 'Backend\UserController@historyForceDelete')->name('userHistoryForceDelete');
    Route::post('user.group_user_store', 'Backend\UserController@group_user_store')->name('group_user_store');
    Route::get('user/user_index_by_role/{roleId?}', 'Backend\UserController@index')->name('user_index_by_role');
    Route::resource('user', 'Backend\UserController');
    Route::resource('country', 'Backend\CountryController');
    Route::resource('city', 'Backend\CityController');
    Route::resource('group', 'Backend\GroupController');
    Route::resource('role', 'Backend\RoleController');
    Route::resource('permission', 'Backend\PermissionController');
    Route::resource('announcement', 'Backend\AnnouncementController');
    Route::resource('page', 'Backend\PageController');
    Route::resource('menu', 'Backend\MenuController');
    Route::resource('contact_type', 'Backend\ContactTypeController');
    Route::resource('contact', 'Backend\ContactController');
    Route::resource('advertisement', 'Backend\AdvertisementController');
    Route::resource('tag', 'Backend\TagController');
    Route::resource('event', 'Backend\EventController');
    Route::get('module_manager/moduleActivationToggle/{moduleSlug}', 'Backend\ModuleManagerController@moduleActivationToggle')->name('moduleActivationToggle');
    Route::get('module_manager/moduleReset/{moduleSlug}', 'Backend\ModuleManagerController@moduleReset')->name('moduleReset');
    Route::get('module_manager/moduleRefreshAndSeed/{moduleSlug}', 'Backend\ModuleManagerController@moduleRefreshAndSeed')->name('moduleRefreshAndSeed');
    Route::resource('module_manager', 'Backend\ModuleManagerController');
    Route::resource('search_list', 'Backend\SearchListController');

    Route::resource('sitemap', 'Backend\SitemapController',['except' => [
        'show'
    ]]);

    Route::resource('rss', 'Backend\RssController');
    Route::post('widget_manager/addWidgetActivation', 'Backend\WidgetManagerController@addWidgetActivation')->name('addWidgetActivation');
    Route::resource('widget_manager', 'Backend\WidgetManagerController');
    Route::get('theme_manager/themeActivationToggle/{themeSlug}', 'Backend\ThemeManagerController@themeActivationToggle')->name('themeActivationToggle');
    Route::resource('theme_manager', 'Backend\ThemeManagerController');
    Route::post('announcement.announcement_establishment_store', 'Backend\AnnouncementController@announcement_establishment_store')->name('announcement_establishment_store');
    Route::post('announcement.list_to_show', 'Backend\AnnouncementController@list_to_show')->name('list_to_show');
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('logs')->middleware(\App\Http\Middleware\LogViewer::class);
    Route::get('ping', 'Backend\PingController@edit')->name('ping');
    Route::post('ping.update', 'Backend\PingController@update')->name('ping.update');
    Route::get('ping.send', 'Backend\PingController@sendPing')->name('ping.send');
    Route::resource('widget_group', 'Backend\WidgetGroupController');
    Route::resource('language', 'Backend\LanguageController');
    Route::get('setting/configCache', 'Backend\SettingController@configCache')->name('configCache');
    Route::get('setting/configClear', 'Backend\SettingController@configClear')->name('configClear');
    Route::get('setting/routeCache', 'Backend\SettingController@routeCache')->name('routeCache');
    Route::get('setting/routeClear', 'Backend\SettingController@routeClear')->name('routeClear');
    Route::get('setting/viewClear', 'Backend\SettingController@viewClear')->name('viewClear');
    Route::get('setting/backUpClean', 'Backend\SettingController@backUpClean')->name('backUpClean');
    Route::get('setting/getBackUp', 'Backend\SettingController@getBackUp')->name('getBackUp');
    Route::get('setting/repairMysqlTables', 'Backend\SettingController@repairMysqlTables')->name('repairMysqlTables');
    Route::get('setting/getAllRedisKey', 'Backend\SettingController@getAllRedisKey')->name('getAllRedisKey');
    Route::get('setting/flushAllCache', 'Backend\SettingController@flushAllCache')->name('flushAllCache');
    Route::resource('setting', 'Backend\SettingController');
    Route::get('remove_home_page_cache', 'Backend\BackendController@removeHomePageCacheWithRedirect')->name('removeHomePageCache');
    Route::get('flush_cache_item/{cacheName}', 'Backend\SettingController@flushCacheItem')->name('flushCacheItem');

    Route::get('removeCacheTags/{cacheTags?}', 'Backend\BackendController@removeCacheTags')->name('removeCacheTags');
    Route::get('api_manager', 'Backend\ApiManagerController@index')->name('api_manager');
});


Route::post('getCitiesByCountryId', 'BaseController@getCitiesByCountryId')->name('getCitiesByCountryId');