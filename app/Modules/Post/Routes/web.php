<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => 'checkperm'], function() {


    Route::resource('post', 'Backend\PostController');

});

//Route::group(['prefix' => 'post'], function() {
//    Route::get('/', function() {
//        dd('This is the Post module index page. Build something great!');
//    });
//});
