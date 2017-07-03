<?php

Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function () {

    /*
     * Article
     * */
    Route::resource('articles', 'Api\Article\ArticleController', ['only' => ['index', 'show']]);
    Route::resource('articles.article_categories', 'Api\Article\ArticleArticleCategoryController', ['only' => ['index']]);

    /*
     * ArticleCategory
     * */
    Route::resource('article_categories', 'Api\Article\ArticleController', ['only' => ['index', 'show']]);
    Route::resource('article_categories.article_authors', 'Api\Article\ArticleArticleCategoryController', ['only' => ['index']]);

    /*
     * ArticleAuthor
     * */
    Route::resource('article_authors', 'Api\ArticleAuthor\ArticleAuthorController', ['only' => ['index', 'show']]);
    Route::resource('article_authors.articles', 'Api\ArticleAuthor\ArticleAuthorArticleController', ['only' => ['index']]);
});