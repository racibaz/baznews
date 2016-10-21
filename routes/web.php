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

Route::get('/', 'Frontend\IndexController@index')->name('index');
Route::get('sitemap.xml', 'Frontend\SitemapController@sitemaps')->name('sitemaps');
Route::get('rss.xml', 'Frontend\RssController@rssRender')->name('rss');

//Route::get('/', function () {
//    return view('welcome');
//});



//Route::group(['prefix' => 'admin', 'middleware' => ['role:super_admin|admin|owner|editor|member']], function() {
Route::group(['prefix' => 'admin', 'middleware' => 'checkperm'], function() {
//Route::group(['prefix' => 'admin'], function() {

    Route::get('/', 'Backend\DashboardController@index')->name('dashboard');
    Route::get('index', 'Backend\DashboardController@index');
    Route::get('dashboard', 'Backend\DashboardController@index');

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

    Route::get('setting/repairMysqlTables', 'Backend\SettingController@repairMysqlTables')->name('repairMysqlTables');
    Route::resource('setting', 'Backend\SettingController');
    Route::resource('tag', 'Backend\TagController');
    Route::resource('event', 'Backend\EventController');
    Route::resource('module', 'Backend\ModuleController');
    Route::resource('sitemap', 'Backend\SitemapController');
    Route::resource('rss', 'Backend\RssController');


    Route::post('announcement.announcement_establishment_store', 'Backend\AnnouncementController@announcement_establishment_store')->name('announcement_establishment_store');
    Route::post('announcement.announcement_group_store', 'Backend\AnnouncementController@announcement_group_store')->name('announcement_group_store');
    Route::post('announcement.list_to_show', 'Backend\AnnouncementController@list_to_show')->name('list_to_show');
//    Route::get('user_operation/{user_id}', 'UserController@user_operation')->name('user_operation');


    Route::get('piwik', 'Backend\PiwikController@index');
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
});
Auth::routes();

Route::get('/home', 'HomeController@index');
