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


Route::pattern('slug', '[a-z0-9-]+');

Route::get('/{slug}', 'Frontend\NewsController@show')->name('show_news');

Route::get('archive/{years?}/{months?}/{days?}', 'Frontend\ArchiveController@index')
    ->name('archive_index')
    ->where('years', '[0-9]+')
    ->where('months', '[0-9]+')
    ->where('days', '[0-9]+');

//todo get yapılacak ve pattern eklenecek.
Route::post(trans('news::route.search'), 'Frontend\SearchController@index')->name('search');

Route::get('news_sitemap', 'Frontend\SitemapController@sitemap')->name('news_sitemap');
Route::get('category/{slug}', 'Frontend\NewsCategoryController@getNewsByNewsCategorySlug')->name('show_news_category');
Route::get('video_galleries/{slug}', 'Frontend\VideoGalleryController@getVideoGalleryBySlug')->name('show_video_gallery');
Route::get('videos/{slug}', 'Frontend\VideoController@getVideoBySlug')->name('show_videos');


Route::get('photo_gallery/{slug}', 'Frontend\PhotoGalleryController@getPhotoGalleryBySlug')->name('show_photo_gallery');
Route::get('photo/{slug}', 'Frontend\PhotoController@getPhotoBySlug')->name('show_photo');
Route::get('gallery_photo/{slug}', 'Frontend\PhotoGalleryController@showGalleryPhotos')->name('show_gallery_photos');


Route::get('editor-profile/{slug}', 'Frontend\EditorController@showProfile')->name('editor-profile');



Route::group(['prefix' => 'rss'], function() {

    Route::get('all_news', 'Frontend\RssController@allNewsRssRender')->name('rss/all_news');
    Route::get('band_news', 'Frontend\RssController@bandNewsRssRender')->name('rss/band_news');
    Route::get('box_cuff', 'Frontend\RssController@boxCuffRssRender')->name('rss/box_cuff');
    Route::get('break_news', 'Frontend\RssController@breakNewsRssRender')->name('rss/break_news');
    Route::get('main_cuff', 'Frontend\RssController@mainCuffRssRender')->name('rss/main_cuff');
    Route::get('mini_cuff', 'Frontend\RssController@miniCuffRssRender')->name('rss/mini_cuff');
    Route::get('videos', 'Frontend\RssController@videosRssRender')->name('rss/videos');
    //TODO video kategorileri, photo kategorileri, photo lar da eklenecek.

    //TODO XSS script sorunu olur mu? test edilecek gerekli önlemler alınacak
    Route::get('news_category/{category_name}', 'Frontend\RssController@getNewsCategoryRssRender')->name('rss/category');
});



Route::group(['prefix' => 'admin', 'middleware' => 'checkperm'], function() {

    //todo gerek olursa news ve diğerleri için dashboard lar yapılacak.
    Route::get('/news_dashboard', 'Backend\NewsDashboardController@index')->name('news_dashboard');

    Route::resource('news_category', 'Backend\NewsCategoryController');

    /*
     * todo
     *
     * laravel-filemanager middleware bizim checkperm le yapılması gerekiyor.
     *
     * */

//    Route::filter('laravel-filemanager', function()
//    {
//        // check the current user
//        if (!Entrust::can('create-post')) {
//            return Redirect::to('admin');
//        }
//    });


    Route::get('news/showTrashedRecords/{trashedRecord}', 'Backend\NewsController@trashedNewsRestore')->name('trashedNewsRestore');
    Route::get('news/trashedNewsRestore', 'Backend\NewsController@showTrashedRecords')->name('showTrashedRecords');
    Route::delete('news.historyForceDelete/{historyForceDeleteRecordId}', 'Backend\NewsController@historyForceDelete')->name('historyForceDelete');
    Route::post('news.status_toggle', 'Backend\NewsController@statusToggle')->name('status_toggle');
    Route::get('news.toggle_boolean_type/{newsId}/{key}', 'Backend\NewsController@toggleBooleanType')->name('toggle_boolean_type');
    Route::post('news.news_photos_store', 'Backend\NewsController@news_photos_store')->name('news_photos_store');
    Route::post('news.news_videos_store', 'Backend\NewsController@news_videos_store')->name('news_videos_store');
    Route::post('news.news_video_galleries_store', 'Backend\NewsController@news_video_galleries_store')->name('news_video_galleries_store');
    Route::post('news.news_photo_galleries_store', 'Backend\NewsController@news_photo_galleries_store')->name('news_photo_galleries_store');
    Route::post('news.photo_galleries_news_store', 'Backend\NewsController@photo_galleries_news_store')->name('photo_galleries_news_store');
    Route::post('news.tags_news_store', 'Backend\NewsController@tags_news_store')->name('tags_news_store');
    Route::post('news.related_news_news_store', 'Backend\NewsController@related_news_news_store')->name('related_news_news_store');
    Route::post('news.recommendation_news_store', 'Backend\NewsController@recommendation_news_store')->name('recommendation_news_store');
    Route::post('news.future_news_store', 'Backend\NewsController@future_news_store')->name('future_news_store');
    Route::post('news.news_news_categories_store', 'Backend\NewsController@news_news_categories_store')->name('news_news_categories_store');
    Route::post('news/newsFilter', 'Backend\NewsController@newsFilter')->name('newsFilter');
    Route::get('news.forget_news_cache', 'Backend\NewsController@forgetCache')->name('forget_news_cache');
    Route::get('news.status/{status?}', 'Backend\NewsController@index')->name('news_statuses');
    Route::resource('news', 'Backend\NewsController');
    Route::resource('news_source', 'Backend\NewsSourceController');
    Route::resource('future_news', 'Backend\FutureNewsController');

    Route::get('photo_gallery/add_multi_photos_view/{photo_gallery_id}', 'Backend\PhotoGalleryController@addMultiPhotosView')->name('add_multi_photos_view');
    Route::post('photo_gallery/add_multi_photos', 'Backend\PhotoGalleryController@addMultiPhotos')->name('addMultiPhotos');
    Route::post('photo_gallery/updateGalleryPhotos', 'Backend\PhotoGalleryController@updateGalleryPhotos')->name('updateGalleryPhotos');
    Route::get('photo_gallery/forget_photo_gallery_cache', 'Backend\PhotoGalleryController@forgetCache')->name('forget_photo_gallery_cache');
    Route::resource('photo_gallery', 'Backend\PhotoGalleryController');

    Route::resource('photo', 'Backend\PhotoController');
    Route::resource('photo_category', 'Backend\PhotoCategoryController');
    Route::resource('video_category', 'Backend\VideoCategoryController');


    Route::get('video_gallery/add_multi_videos_view/{video_gallery_id}', 'Backend\VideoGalleryController@addMultiVideosView')->name('add_multi_videos_view');
    Route::post('video_gallery/add_multi_videos', 'Backend\VideoGalleryController@addMultiVideos')->name('addMultiVideos');
    Route::post('video_gallery/updateGalleryVideos', 'Backend\VideoGalleryController@updateGalleryVideos')->name('updateGalleryVideos');
    Route::get('video_gallery/forget_video_gallery_cache', 'Backend\VideoGalleryController@forgetCache')->name('forget_video_gallery_cache');
    Route::resource('video_gallery', 'Backend\VideoGalleryController');

    Route::post('video.tags_video_store', 'Backend\VideoController@tags_video_store')->name('tags_video_store');
    Route::resource('video', 'Backend\VideoController');
    Route::resource('recommendation_news', 'Backend\RecommendationNewsController');

});


Route::group(['prefix' => 'news'], function() {
    Route::get('/', function() {
        dd('This is the News module index page. Build something great!');
    });
});
