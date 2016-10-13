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


    Route::resource('author', 'Backend\AuthorController');
    
    Route::post('article.article_article_category_store', 'Backend\ArticleController@article_article_category_store')->name('article_article_category_store');
    Route::resource('article', 'Backend\ArticleController');
    Route::resource('article_category', 'Backend\ArticleCategoryController');
});






Route::group(['prefix' => 'article'], function() {
    Route::get('/', function() {
        dd('This is the Article module index page. Build something great!');
    });
});
