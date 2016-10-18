<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Setting;
use App\Modules\Article\Models\Author;
use App\Modules\Book\Http\Controllers\Frontend\BookController;
use App\Modules\News\Models\News;
use App\Modules\News\Models\NewsCategory;
use Caffeinated\Modules\Facades\Module;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;

class IndexController extends Controller
{
    public function index()
    {

         return Cache::remember('home-page', 10, function() {


             //TODO setting tek satır yapılacak
             $pageSetting = Setting::all();

             dd($pageSetting);


             $modules = Module::enabled();
             $cuffNewsCategories = NewsCategory::with('news')->where('is_cuff', 1)->where('is_active', 1)->get();
             $breakNewsItems =  News::where('break_news', 1)->where('status', 1)->take(5)->get();
             $bandNewsItems =  News::where('band_news', 1)->where('status', 1)->take(5)->get();
             $mainCuffNewsItems =  News::where('main_cuff', 1)->where('status', 1)->take(20)->get();
             $miniCuffNewsItems =  News::where('mini_cuff', 1)->where('status', 1)->take(10)->get();

            return Theme::view('frontend.index',compact(
                'pageSetting',
                'breakNewsItems',
                'bandNewsItems',
                'mainCuffNewsItems',
                'miniCuffNewsItems',
                'cuffNewsCategories',
                'modules'
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
