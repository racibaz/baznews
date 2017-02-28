<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\WidgetManager;
use App\Modules\News\Repositories\NewsRepository;
use App\Modules\News\Repositories\PhotoGalleryRepository;
use App\Modules\News\Repositories\RecommendationNewsRepository;
use App\Modules\News\Repositories\VideoGalleryRepository;
use App\Repositories\MenuRepository;
use Caffeinated\Modules\Facades\Module;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class IndexController extends Controller
{

    public function index()
    {
          return Cache::remember('homePage', 100, function() {

             $newsRepository = new NewsRepository();
             $breakNewsItems    =  $newsRepository->where('break_news', 1)->where('status', 1)->limit(Redis::get('break_news'))->findAll();
             $bandNewsItems     =  $newsRepository->where('band_news', 1)->where('status', 1)->limit(Redis::get('band_news'))->findAll();
             $mainCuffNewsItems =  $newsRepository->where('main_cuff', 1)->where('status', 1)->limit(Redis::get('main_cuff'))->findAll();
             $miniCuffNewsItems =  $newsRepository->where('mini_cuff', 1)->where('status', 1)->limit(Redis::get('mini_cuff'))->findAll();
             $boxCuffNewsItems  =  $newsRepository->where('box_cuff', 1)->where('status', 1)->limit(5)->orderBy('updated_at','desc')->findAll();

             $photoGalleryRepository = new PhotoGalleryRepository();
             $photoGalleries = $photoGalleryRepository->where('is_active',1)->where('is_cuff',1)->limit(Redis::get('photo_gallery'))->findAll();

             $videoGalleryRepository = new VideoGalleryRepository();
             $videoGalleries = $videoGalleryRepository->where('is_active',1)->where('is_cuff',1)->limit(Redis::get('video_gallery'))->findAll();

             $recommendationNewsRepository = new RecommendationNewsRepository();
             $recommendationNewsItems = $recommendationNewsRepository->with(['news'])
                                                                         ->where('is_active', 1)
                                                                         ->where('is_cuff', 1)
                                                                         ->limit(Redis::get('recommendation_news'))
                                                                         ->orderBy('order','asc')
                                                                         ->findAll();

             $widgets = WidgetManager::where('is_active',1)->get();

             if(!Redis::exists('widgets')){
                 Redis::set('widgets', $widgets);
             }


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
                'menus',
                'photoGalleries',
                'videoGalleries',
                'recommendationNewsItems',
                'widgets'
            ))->render();

        });

//        $records =  Cache::remember('index', 10, function() {
//
//            $records = News::where('is_active',1)->get();
//
//            return $records;
//        });

        //return $this->response->collection($records, new BookTransformer() )->setStatusCode(200);

       // return Theme::view('frontend.index',compact('records'));
    }
}
