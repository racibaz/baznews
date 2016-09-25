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


Route::group(['prefix' => 'admin', 'middleware' => 'checkperm'], function() {
    Route::resource('book', 'Backend\BookController');
});






Route::group(['prefix' => 'book'], function() {
    Route::get('/', function() {
        dd('This is the Book module index page. Build something great!');
    });
});
