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

Route::get('/', function () {
    return view('welcome');
});



//Route::group(['prefix' => 'admin', 'middleware' => ['role:super_admin|admin|owner|editor|member']], function() {
//Route::group(['prefix' => 'admin', 'middleware' => 'checkperm'], function() {
Route::group(['prefix' => 'admin'], function() {


    Route::get('/', 'Backend\DashboardController@index')->name('dashboard');
    Route::get('index', 'Backend\DashboardController@index');
    Route::get('dashboard', 'Backend\DashboardController@index');

    Route::resource('user', 'Backend\UserController');
    Route::resource('country', 'Backend\CountryController');
    Route::resource('city', 'Backend\CityController');
    Route::resource('group', 'Backend\GroupController');
    Route::resource('role', 'Backend\RoleController');
    Route::resource('permission', 'Backend\PermissionController');


//    Route::post('announcement.announcement_establishment_store', 'AnnouncementController@announcement_establishment_store')->name('announcement_establishment_store');
//    Route::get('user_operation/{user_id}', 'UserController@user_operation')->name('user_operation');

});