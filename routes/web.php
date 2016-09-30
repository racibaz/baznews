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

Route::get('/', function () {
    return view('welcome');
});



//Route::group(['prefix' => 'admin', 'middleware' => ['role:super_admin|admin|owner|editor|member']], function() {
Route::group(['prefix' => 'admin', 'middleware' => 'checkperm'], function() {
//Route::group(['prefix' => 'admin'], function() {

    Route::get('/', 'Backend\DashboardController@index')->name('dashboard');
    Route::get('index', 'Backend\DashboardController@index');
    Route::get('dashboard', 'Backend\DashboardController@index');

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
    Route::resource('setting', 'Backend\SettingController');
    Route::resource('tag', 'Backend\TagController');
    Route::resource('event', 'Backend\EventController');


    Route::post('announcement.announcement_establishment_store', 'Backend\AnnouncementController@announcement_establishment_store')->name('announcement_establishment_store');
    Route::post('announcement.announcement_group_store', 'Backend\AnnouncementController@announcement_group_store')->name('announcement_group_store');
    Route::post('announcement.list_to_show', 'Backend\AnnouncementController@list_to_show')->name('list_to_show');
//    Route::get('user_operation/{user_id}', 'UserController@user_operation')->name('user_operation');


    Route::get('piwik', 'Backend\PiwikController@index');
});
Auth::routes();

Route::get('/home', 'HomeController@index');
