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

//Auth::loginUsingId(1);
//Route::auth();

Auth::routes();

Route::get('/', 'Frontend\IndexController@index')->name('index');
Route::get('/home', 'HomeController@index');
Route::get(trans('route.page') . '/{slug}', 'Frontend\PageController@show')->name('page');

Route::get('/activate/token/{token}', 'Auth\ActivationController@activate')->name('auth.activate');
Route::get('/activate/resend', 'Auth\ActivationController@resend')->name('auth.activate.resend');

Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider')->name('login_socialite');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback')->name('register_socialite');

Route::get('sitemap.xml', 'Frontend\SitemapController@sitemaps')->name('sitemaps');
Route::get('rss.xml', 'Frontend\RssController@rssRender')->name('rss');

Route::get('/tags/{q}', 'Frontend\SearchController@tagSearch')->name('tag_search');

Route::resource('account', 'Frontend\AccountController', ['only' => [
    'index', 'edit', 'update','show'
]]);

Route::get(trans('route.contact'), 'Frontend\ContactController@index')->name('contact-index');
Route::post(trans('route.contact'), 'Frontend\ContactController@store')->name('contact-store');


Route::group(['prefix' => 'admin', 'middleware' => 'checkperm'], function() {

    Route::get('/', 'Backend\DashboardController@index')->name('dashboard');
    Route::get('index', 'Backend\DashboardController@index');
    Route::get('dashboard', 'Backend\DashboardController@index');


    Route::get('user/trashedUserRestore/{trashedRecord}', 'Backend\UserController@trashedUserRestore')->name('trashedUserRestore');
    Route::get('user/showTrashedRecords', 'Backend\UserController@showTrashedRecords')->name('showTrashedUserRecords');
    Route::delete('user.historyForceDelete/{historyForceDeleteRecordId}', 'Backend\UserController@historyForceDelete')->name('userHistoryForceDelete');


    Route::post('user.role_user_store', 'Backend\UserController@role_user_store')->name('role_user_store');
    Route::post('user.group_user_store', 'Backend\UserController@group_user_store')->name('group_user_store');
    Route::resource('user', 'Backend\UserController');
    Route::resource('country', 'Backend\CountryController');
    Route::resource('city', 'Backend\CityController');
    Route::resource('group', 'Backend\GroupController');

    Route::post('role.permission_role_store', 'Backend\RoleController@permission_role_store')->name('permission_role_store');
    Route::resource('role', 'Backend\RoleController');

    Route::resource('permission', 'Backend\PermissionController');
    Route::resource('announcement', 'Backend\AnnouncementController');
    Route::resource('page', 'Backend\PageController');
    Route::resource('menu', 'Backend\MenuController');
    Route::resource('contact_type', 'Backend\ContactTypeController');
    Route::resource('contact', 'Backend\ContactController');

    Route::get('setting/configCache', 'Backend\SettingController@configCache')->name('configCache');
    Route::get('setting/configClear', 'Backend\SettingController@configClear')->name('configClear');
    Route::get('setting/routeClear', 'Backend\SettingController@routeClear')->name('routeClear');
    Route::get('setting/viewClear', 'Backend\SettingController@viewClear')->name('viewClear');
    Route::get('setting/backUpClean', 'Backend\SettingController@backUpClean')->name('backUpClean');
    Route::get('setting/getBackUp', 'Backend\SettingController@getBackUp')->name('getBackUp');
    Route::get('setting/repairMysqlTables', 'Backend\SettingController@repairMysqlTables')->name('repairMysqlTables');
    Route::get('setting/getAllRedisKey', 'Backend\SettingController@getAllRedisKey')->name('getAllRedisKey');
    Route::get('setting/flushAllCache', 'Backend\SettingController@flushAllCache')->name('flushAllCache');
    Route::resource('setting', 'Backend\SettingController');
    Route::resource('tag', 'Backend\TagController');
    Route::resource('event', 'Backend\EventController');
    Route::get('module_manager/moduleActivationToggle/{moduleSlug}', 'Backend\ModuleManagerController@moduleActivationToggle')->name('moduleActivationToggle');
    Route::resource('module_manager', 'Backend\ModuleManagerController');
    Route::resource('sitemap', 'Backend\SitemapController');
    Route::resource('rss', 'Backend\RssController');

    Route::post('widget_manager/addWidgetActivation', 'Backend\WidgetManagerController@addWidgetActivation')->name('addWidgetActivation');
    Route::resource('widget_manager', 'Backend\WidgetManagerController');

    Route::get('theme_manager/themeActivationToggle/{themeSlug}', 'Backend\ThemeManagerController@themeActivationToggle')->name('themeActivationToggle');
    Route::resource('theme_manager', 'Backend\ThemeManagerController');


    Route::post('announcement.announcement_establishment_store', 'Backend\AnnouncementController@announcement_establishment_store')->name('announcement_establishment_store');
    Route::post('announcement.announcement_group_store', 'Backend\AnnouncementController@announcement_group_store')->name('announcement_group_store');
    Route::post('announcement.list_to_show', 'Backend\AnnouncementController@list_to_show')->name('list_to_show');
//    Route::get('user_operation/{user_id}', 'UserController@user_operation')->name('user_operation');


    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

    Route::resource('account', 'Backend\AccountController', ['only' => [
        'edit', 'update','show'
    ]]);

    Route::resource('advertisement', 'Backend\AdvertisementController');
    Route::resource('widget_group', 'Backend\WidgetGroupController');

});

