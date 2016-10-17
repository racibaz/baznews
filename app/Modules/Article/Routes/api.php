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



//$api->version('v1', function ($api) {
$api->version('v1', ['middleware' => 'api.throttle', 'limit' => 100, 'expires' => 5], function ($api) {

    //$api->get('users/{id}', 'App\Api\Controllers\UserController@show');


//    $api->resource('article', 'App\Modules\Article\Http\Controllers\Api\ArticleController', ['only' => [
//        'index', 'show'
//    ]]);


    $api->get('articles/{count?}', 'App\Modules\Article\Http\Controllers\Api\ArticleController@getArticles');
    $api->get('getArticleById/{id}', 'App\Modules\Article\Http\Controllers\Api\ArticleController@getArticleById');



    $api->get('article_categories', 'App\Modules\Article\Http\Controllers\Api\ArticleController@getArticleCategories');

});


Route::get('/article', function (Request $request) {
    // return $request->article();
})->middleware('auth:api');
