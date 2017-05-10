<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:api');


Route::group(['prefix' => 'v1','middleware' => 'auth:api'], function () {
    Route::resource('users', 'Api\User\UserController', ['only' => ['index', 'show']]);
    Route::resource('countries', 'Api\Country\CountryController', ['only' => ['index', 'show']]);
    Route::resource('cities', 'Api\City\CityController', ['only' => ['index', 'show']]);
});