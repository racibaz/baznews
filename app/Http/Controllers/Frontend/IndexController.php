<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\WidgetManager;
use App\Modules\News\Repositories\NewsRepository;
use App\Modules\News\Repositories\PhotoGalleryRepository;
use App\Modules\News\Repositories\VideoGalleryRepository;
use Caffeinated\Modules\Facades\Module;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    public function index()
    {
        return Cache::tags(['homePage'])->rememberForever('homePage', function () {

            try {
                $bandNewsItems = app(NewsRepository::class)->getBandNewsItems();
                $mainCuffNewsItems = app(NewsRepository::class)->getMainCuffItems();
                $miniCuffNewsItems = app(NewsRepository::class)->getMiniCuffItems(10);
                $boxCuffNewsItems = app(NewsRepository::class)->getBoxCuffNewsItems();

                $photoGalleries = app(PhotoGalleryRepository::class)->getCuffPhotoGalleries();
                $videoGalleries = app(VideoGalleryRepository::class)->getCuffVideoGalleries();

                Cache::tags(['Widget'])->rememberForever('widgets', function () {
                    return WidgetManager::getAllWidgets();
                });

                $pageSetting = Setting::all();
                $modules = Module::enabled();

            }catch(\Exception $e){
                abort(404);
            }

            return view('frontend.index', compact(
                'pageSetting',
                'bandNewsItems',
                'mainCuffNewsItems',
                'miniCuffNewsItems',
                'boxCuffNewsItems',
                'cuffNewsCategories',
                'modules',
                'photoGalleries',
                'videoGalleries'
            ))->render();
        });
    }
}
