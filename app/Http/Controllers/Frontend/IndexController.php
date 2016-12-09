<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\WidgetManager;
use App\Modules\News\Models\PhotoGallery;
use App\Modules\News\Models\RecommendationNews;
use App\Modules\News\Models\VideoGallery;
use App\Modules\News\Repositories\NewsCategoryRepository;
use App\Modules\News\Repositories\NewsRepository;
use App\Repositories\MenuRepository;
use Caffeinated\Modules\Facades\Module;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class IndexController extends Controller
{
    public function index()
    {

         return Cache::remember('home-page', 100, function() {


             $newsRepository = new NewsRepository();
             $breakNewsItems    =  $newsRepository->where('break_news', 1)->where('status', 1)->take(Redis::get('break_news'))->get();
             $bandNewsItems     =  $newsRepository->where('band_news', 1)->where('status', 1)->take(Redis::get('band_news'))->get();
             $mainCuffNewsItems =  $newsRepository->where('main_cuff', 1)->where('status', 1)->take(Redis::get('main_cuff'))->get();
             $miniCuffNewsItems =  $newsRepository->where('mini_cuff', 1)->where('status', 1)->take(Redis::get('mini_cuff'))->get();

//             $newsCategoryRepository = new NewsCategoryRepository();
//             $cuffNewsCategories = $newsCategoryRepository->with(['news'])->where('is_cuff', 1)->where('is_active', 1)->get();


             $menuRepository = new MenuRepository();
             $menus = $menuRepository->where('is_active', 1)->orderBy('order','asc')->get();


             $photoGalleryRepository = new PhotoGallery();
             $photoGalleries = $photoGalleryRepository->where('is_active',1)->take(Redis::get('photo_gallery'))->get();

             $videoGalleryRepository = new VideoGallery();
             $videoGalleries = $videoGalleryRepository->where('is_active',1)->take(Redis::get('video_gallery'))->get();


             $recommendationNewsRepository = new RecommendationNews();
             $recommendationNewsItems = $recommendationNewsRepository->with(['news'])
                                                                         ->where('is_active', 1)
                                                                         ->where('is_cuff', 1)
                                                                         ->take(Redis::get('recommendation_news'))
                                                                         ->orderBy('order','asc')
                                                                         ->get();

             $widgets = WidgetManager::where('is_active',1)->get();

             if(!Redis::exists('widgets')){
                 Redis::set('widgets', $widgets);
             }




             //TODO setting tek satır yapılacak
             $pageSetting = Setting::all();

             //dd($pageSetting);

             $modules = Module::enabled();
//             $cuffNewsCategories = NewsCategory::with('news')->where('is_cuff', 1)->where('is_active', 1)->get();
//             $breakNewsItems =  News::where('break_news', 1)->where('status', 1)->take(Redis::get('break_news'))->get();
//             $bandNewsItems =  News::where('band_news', 1)->where('status', 1)->take(Redis::get('band_news'))->get();
//             $mainCuffNewsItems =  News::where('main_cuff', 1)->where('status', 1)->take(Redis::get('main_cuff'))->get();
//             $miniCuffNewsItems =  News::where('mini_cuff', 1)->where('status', 1)->take(Redis::get('mini_cuff'))->get();
//             $menus = Menu::where('is_active', 1)->orderBy('order','asc')->get();


//             $photoGalleries = PhotoGallery::where('is_active',1)->take(Redis::get('photo_gallery'))->get();
//             $videoGalleries = VideoGallery::where('is_active',1)->take(Redis::get('video_gallery'))->get();


//             $recommendationNewsItems = RecommendationNews::with('news')
//                                                             ->where('is_active', 1)
//                                                             ->where('is_cuff', 1)
////                                                             ->orderBy('order','asc')
//                                                             ->take(Redis::get('recommendation_news'))
//                                                             ->get();



            return Theme::view('frontend.index',compact(
                'pageSetting',
                'breakNewsItems',
                'bandNewsItems',
                'mainCuffNewsItems',
                'miniCuffNewsItems',
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
