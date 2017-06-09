<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\WidgetManager;
use App\Modules\News\Repositories\NewsRepository;
use App\Modules\News\Repositories\PhotoGalleryRepository;
use App\Modules\News\Repositories\RecommendationNewsRepository;
use App\Modules\News\Repositories\VideoGalleryRepository;
use Caffeinated\Modules\Facades\Module;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{

    public function index()
    {
          return Cache::tags(['homePage'])->rememberForever('homePage', function() {

             $newsRepository = new NewsRepository();
             $breakNewsItems    =  $newsRepository->where('break_news', 1)->where('status', 1)->limit(Cache::tags('Setting')->get('break_news'))->orderBy('updated_at','desc')->findAll();
             $bandNewsItems     =  $newsRepository->where('band_news', 1)->where('status', 1)->limit(Cache::tags('Setting')->get('band_news'))->orderBy('updated_at','desc')->findAll();
             $mainCuffNewsItems =  $newsRepository->where('main_cuff', 1)->where('status', 1)->limit(Cache::tags('Setting')->get('main_cuff'))->orderBy('updated_at','desc')->findAll();
             $miniCuffNewsItems =  $newsRepository->where('mini_cuff', 1)->where('status', 1)->limit(Cache::tags('Setting')->get('mini_cuff'))->orderBy('updated_at','desc')->findAll();
             $boxCuffNewsItems  =  $newsRepository->where('box_cuff', 1)->where('status', 1)->limit(5)->orderBy('updated_at','desc')->findAll();

             $photoGalleryRepository = new PhotoGalleryRepository();
             $photoGalleries = $photoGalleryRepository->where('is_active',1)->where('is_cuff',1)->limit(Cache::tags('Setting')->get('photo_gallery'))->orderBy('updated_at','desc')->findAll();

             $videoGalleryRepository = new VideoGalleryRepository();
             $videoGalleries = $videoGalleryRepository->where('is_active',1)->where('is_cuff',1)->limit(Cache::tags('Setting')->get('video_gallery'))->orderBy('updated_at','desc')->findAll();

             $recommendationNewsRepository = new RecommendationNewsRepository();
             $recommendationNewsItems = $recommendationNewsRepository->with(['news'])
                                                                         ->where('is_active', 1)
                                                                         ->where('is_cuff', 1)
                                                                         ->limit(Cache::tags('Setting')->get('recommendation_news'))
                                                                         ->orderBy('order','asc')
                                                                         ->findAll();

              Cache::tags(['Widget'])->rememberForever('widgets', function() {
                  return WidgetManager::where('is_active',1)->get();
              });

             $pageSetting = Setting::all();
             $modules = Module::enabled();

            return Theme::view('frontend.index',compact(
                'pageSetting',
                'breakNewsItems',
                'bandNewsItems',
                'mainCuffNewsItems',
                'miniCuffNewsItems',
                'boxCuffNewsItems',
                'cuffNewsCategories',
                'modules',
                'photoGalleries',
                'videoGalleries',
                'recommendationNewsItems'
            ))->render();

        });
    }
}
