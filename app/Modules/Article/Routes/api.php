<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your module. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


$api = app('Dingo\Api\Routing\Router');



$api->version('v1', function ($api) {

    //$api->get('users/{id}', 'App\Api\Controllers\UserController@show');

    $api->get('articles', 'App\Modules\Article\Http\Controllers\Api\ArticleController@getArticles');
    $api->get('article_categories', 'App\Modules\Article\Http\Controllers\Api\ArticleController@getArticleCategories');
    $api->get('authors/{count?}', 'App\Modules\Article\Http\Controllers\Api\AuthorController@getAuthors')->where('count', '[0-9]+');

});


Route::get('/article', function (Request $request) {
    // return $request->article();
})->middleware('auth:api');
