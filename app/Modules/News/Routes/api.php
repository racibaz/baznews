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

    $api->get('/', 'App\Modules\News\Http\Controllers\Api\NewsController@dashboard');
    $api->get('news/{count?}', 'App\Modules\News\Http\Controllers\Api\NewsController@getNews')->where('count', '[0-9]+');
    $api->get('getNewsById/{id}', 'App\Modules\News\Http\Controllers\Api\NewsController@getNewsById')->where('id', '[0-9]+');

});




//Route::get('/news', function (Request $request) {
//    // return $request->news();
//})->middleware('auth:api');
