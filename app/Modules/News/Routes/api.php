<?php

Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function () {
    /*
     * News
     * */
    Route::resource('news', 'Api\News\NewsController', ['only' => ['index', 'show']]);
    Route::resource('news.photo_galleries', 'Api\News\NewsPhotoGalleryController', ['only' => ['index']]);
    Route::resource('news.video_galleries', 'Api\News\NewsVideoGalleryController', ['only' => ['index']]);
    Route::resource('news.categories', 'Api\News\NewsNewsCategoryController', ['only' => ['index']]);
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
    Route::resource('video_categories.videos', 'Api\VideoCategory\VideoCategoryVideoController', ['only' => ['index']]);
    Route::resource('video_categories.video_galleries', 'Api\VideoCategory\VideoCategoryVideoGalleryController', ['only' => ['index']]);

    /*
    * Video Gallery
    * */
    Route::resource('video_galleries', 'Api\VideoGallery\VideoGalleryController', ['only' => ['index', 'show']]);
    Route::resource('video_galleries.videos', 'Api\VideoGallery\VideoGalleryVideoController', ['only' => ['index']]);

    /*
    * Photo Category
    * */
    Route::resource('photo_categories', 'Api\PhotoCategory\PhotoCategoryController', ['only' => ['index', 'show']]);
    Route::resource('photo_categories.photo_galleries', 'Api\PhotoCategory\PhotoCategoryPhotoGalleryController', ['only' => ['index']]);

    /*
    * Photo Gallery
    * */
    Route::resource('photo_galleries', 'Api\PhotoGallery\PhotoGalleryController', ['only' => ['index', 'show']]);
    Route::resource('photo_galleries.photos', 'Api\PhotoGallery\PhotoGalleryPhotoController', ['only' => ['index']]);

    /*
    * Video
    * */
    Route::resource('videos', 'Api\Video\VideoController', ['only' => ['index', 'show']]);

    /*
    * Photo
    * */
    Route::resource('photos', 'Api\Photo\PhotoController', ['only' => ['index', 'show']]);
    Route::resource('photos.news', 'Api\Photo\PhotoNewsController', ['only' => ['index']]);

    /*
    * Related News
    * */
    Route::resource('related_news', 'Api\RelatedNews\RelatedNewsController', ['only' => ['index', 'show']]);
});
