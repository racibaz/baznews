<?php


Route::group(['prefix' => 'v1','middleware' => 'auth:api'], function () {
    Route::get('news/{id}', 'Api\NewsController@show');
});


//Route::group(['prefix' => 'v1'], function () {
//
//    Route::get('news/{id}', 'App\Modules\News\Http\Controllers\Api\NewsController@news');
//
//    Route::get('/', 'TopicController@index');
//    Route::get('/{topic}', 'TopicController@show');
//    Route::post('/', 'TopicController@store')->middleware('auth:api');
//    Route::patch('/{topic}', 'TopicController@update')->middleware('auth:api');
//    Route::delete('/{topic}', 'TopicController@destroy')->middleware('auth:api');
//
//    Route::group(['prefix' => '/{topic}/posts'], function () {
//        Route::post('/', 'PostController@store')->middleware('auth:api');
//        Route::patch('/{post}', 'PostController@update')->middleware('auth:api');
//        Route::delete('/{post}', 'PostController@destroy')->middleware('auth:api');
//
//        Route::group(['prefix' => '/{post}/likes'], function () {
//            Route::post('/', 'PostLikeController@store')->middleware('auth:api');
//        });
//    });
//});