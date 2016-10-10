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

    dd('v1');
    $api->get('users/{id}', 'App\Api\Controllers\UserController@show');
});



Route::get('/news', function (Request $request) {
    // return $request->news();
})->middleware('auth:api');
