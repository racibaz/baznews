<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/




Route::group(['prefix' => 'admin', 'middleware' => 'checkperm'], function() {


    Route::resource('news_category', 'Backend\NewsCategoryController');
    Route::resource('news', 'Backend\NewsController');
    Route::resource('news_source', 'Backend\NewsSourceController');
    Route::resource('future_news', 'Backend\FutureNewsController');

    Route::get('photo_gallery/add_multi_photos_view/{photo_gallery_id}', 'Backend\PhotoGalleryController@addMultiPhotosView')->name('add_multi_photos_view');
    Route::post('photo_gallery/add_multi_photos', 'Backend\PhotoGalleryController@addMultiPhotos')->name('addMultiPhotos');
    Route::post('photo_gallery/updateGalleryPhotos', 'Backend\PhotoGalleryController@updateGalleryPhotos')->name('updateGalleryPhotos');
    Route::resource('photo_gallery', 'Backend\PhotoGalleryController');

    Route::resource('photo', 'Backend\PhotoController');
    Route::resource('photo_category', 'Backend\PhotoCategoryController');
    Route::resource('video_category', 'Backend\VideoCategoryController');
    Route::resource('video_gallery', 'Backend\VideoGalleryController');
    Route::resource('video', 'Backend\VideoController');
    Route::resource('recommendation_news', 'Backend\RecommendationNewsController');
    Route::resource('biography', 'Backend\BiographyController');

});


Route::group(['prefix' => 'news'], function() {
    Route::get('/', function() {
        dd('This is the News module index page. Build something great!');
    });
});
