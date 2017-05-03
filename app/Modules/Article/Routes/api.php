<?php

Route::group(['prefix' => 'v1','middleware' => 'auth:api'], function () {
    Route::get('article/{id}', 'Api\ArticleController@show');
    Route::get('article', 'Api\ArticleController@index');
});
