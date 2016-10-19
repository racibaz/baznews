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



Route::get('books', 'Frontend\BookController@index')->name('books');
Route::get('books_sitemap', 'Frontend\SitemapController@sitemap')->name('books_sitemap');


Route::group(['prefix' => 'admin', 'middleware' => 'checkperm'], function() {
    Route::resource('book', 'Backend\BookController');
});

