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


    Route::resource('news_category', 'Backend\NewsCategoryController');
    Route::resource('news', 'Backend\NewsController');
    Route::resource('news_source', 'Backend\NewsSourceController');
    Route::resource('photo_gallery', 'Backend\PhotoGalleryController');
    Route::resource('photo', 'Backend\PhotoController');
    Route::resource('photo_category', 'Backend\PhotoCategoryController');

});




Route::group(['prefix' => 'news'], function() {
    Route::get('/', function() {
        dd('This is the News module index page. Build something great!');
    });
});
