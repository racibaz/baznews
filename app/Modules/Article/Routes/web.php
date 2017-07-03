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

Route::get('article/{slug}', 'Frontend\ArticleController@show')->name('article');
Route::get('article-category/{slug}', 'Frontend\ArticleCategoryController@show')->name('article_category');
Route::get('article-author/{slug}', 'Frontend\ArticleAuthorController@show')->name('article_author');
Route::get('article-authors', 'Frontend\ArticleAuthorController@index')->name('article_authors');
Route::get('articles_sitemap', 'Frontend\SitemapController@sitemap')->name('articles_sitemap');

Route::group(['prefix' => 'rss'], function () {
    Route::get('articles', 'Frontend\RssController@articlesRssRender')->name('rss/articles');
});

Route::group(['prefix' => 'admin', 'middleware' => 'checkperm'], function () {

    Route::resource('article_author', 'Backend\ArticleAuthorController');
    Route::post('article.article_article_category_store', 'Backend\ArticleController@article_article_category_store')->name('article_article_category_store');
    Route::get('article.status/{status?}', 'Backend\ArticleController@index')->name('article_statuses');
    Route::resource('article', 'Backend\ArticleController');
    Route::resource('article_category', 'Backend\ArticleCategoryController');
    Route::resource('article_setting', 'Backend\ArticleSettingController');
});
