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



Route::get('book/{slug}', 'Frontend\BookController@show')->name('book');
Route::get('book-category/{slug}', 'Frontend\BookCategoryController@show')->name('book_category');

Route::get('books_sitemap', 'Frontend\SitemapController@sitemap')->name('books_sitemap');


Route::group(['prefix' => 'rss'], function() {
    Route::get('books', 'Frontend\RssController@booksRssRender')->name('rss/books');
});


Route::group(['prefix' => 'admin', 'middleware' => 'checkperm'], function() {
    Route::resource('book', 'Backend\BookController');
    Route::resource('book_category', 'Backend\BookCategoryController');
    Route::resource('publisher', 'Backend\PublisherController');
});

