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

    $api->get('books/{count?}', 'App\Modules\Book\Http\Controllers\Api\BookController@getBooks')->where('count', '[0-9]+');
    $api->get('getBookById/{id}', 'App\Modules\Book\Http\Controllers\Api\BookController@getBookById')->where('id', '[0-9]+');

});



Route::get('/book', function (Request $request) {
    // return $request->book();
})->middleware('auth:api');
