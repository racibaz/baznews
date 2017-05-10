<?php

Route::group(['prefix' => 'v1','middleware' => 'auth:api'], function () {

    /*
     * News
     * */
    Route::resource('news', 'Api\News\NewsController', ['only' => ['index', 'show']]);
    Route::resource('news.photo_galleries', 'Api\News\NewsPhotoGalleryController', ['only' => ['index']]);
    Route::resource('news.video_galleries', 'Api\News\NewsVideoGalleryController', ['only' => ['index']]);
    Route::resource('news.categories', 'Api\News\NewsCategoryController', ['only' => ['index']]);
    Route::resource('news.videos', 'Api\News\NewsVideoController', ['only' => ['index']]);
    Route::resource('news.photos', 'Api\News\NewsPhotoController', ['only' => ['index']]);
    Route::resource('news.related_news', 'Api\News\NewsRelatedNewsController', ['only' => ['index']]);

    /*
     * News Source
     * */
    Route::resource('news_sources', 'Api\NewsSource\NewsSourceController', ['only' => ['index', 'show']]);
    Route::resource('news_sources.news', 'Api\NewsSource\NewsSourceNewsController', ['only' => ['index']]);

    /*
    * News Category
    * */
    Route::resource('news_categories', 'Api\NewsCategory\NewsCategoryController', ['only' => ['index', 'show']]);
    Route::resource('news_categories.news', 'Api\NewsCategory\NewsCategoryNewsController', ['only' => ['index']]);

    /*
    * Video Category
    * */
    Route::resource('video_categories', 'Api\VideoCategory\VideoCategoryController', ['only' => ['index', 'show']]);
    Route::resource('video_categories.videos', 'Api\VideoCategory\NewsCategoryNewsController', ['only' => ['index']]);

    /*
    * Video Gallery
    * */
    Route::resource('video_galleries', 'Api\VideoGallery\VideoGalleryController', ['only' => ['index', 'show']]);
    Route::resource('video_galleries.videos', 'Api\VideoGallery\NewsCategoryNewsController', ['only' => ['index']]);

    /*
    * Photo Category
    * */
    Route::resource('photo_categories', 'Api\PhotoCategory\PhotoCategoryController', ['only' => ['index', 'show']]);
    Route::resource('photo_categories.photos', 'Api\PhotoCategory\PhotoCategoryController', ['only' => ['index']]);

    /*
    * Photo Gallery
    * */
    Route::resource('photo_galleries', 'Api\PhotoGallery\PhotoGalleryController', ['only' => ['index', 'show']]);
    Route::resource('photo_galleries.photos', 'Api\PhotoGallery\PhotoGalleryController', ['only' => ['index']]);

    /*
    * Video
    * */
    Route::resource('videos', 'Api\Video\VideoController', ['only' => ['index', 'show']]);

    /*
    * Photo
    * */
    Route::resource('photos', 'Api\Photo\PhotoController', ['only' => ['index', 'show']]);

    /*
    * Related News
    * */
    Route::resource('related_news', 'Api\RelatedNews\RelatedNewsController', ['only' => ['index', 'show']]);



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