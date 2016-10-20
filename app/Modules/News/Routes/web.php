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




Route::get('news_sitemap', 'Frontend\SitemapController@sitemap')->name('news_sitemap');


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


    Route::resource('news_category', 'Backend\NewsCategoryController');

    Route::post('news/newsFilter', 'Backend\NewsController@newsFilter')->name('newsFilter');
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
