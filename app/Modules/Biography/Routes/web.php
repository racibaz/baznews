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


Route::get('biography/{slug}', 'Frontend\BiographyController@show')->name('biography');
Route::get('biographies_sitemap', 'Frontend\SitemapController@sitemap')->name('biographies_sitemap');

Route::group(['prefix' => 'admin', 'middleware' => 'checkperm'], function() {
    Route::resource('biography', 'Backend\BiographyController');
});