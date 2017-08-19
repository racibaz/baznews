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
        return Cache::tags(['homePage'])->rememberForever('homePage', function () {

            $newsRepository = new NewsRepository();
            // $breakNewsItems değerini BaznewsServicePorvider da View::share() methodu ile alıyoruz.
            $bandNewsItems = $newsRepository->getBandNewsItems();
            $mainCuffNewsItems = $newsRepository->getMainCuffItems();
            $miniCuffNewsItems = $newsRepository->getMiniCuffItems();
            $boxCuffNewsItems = $newsRepository->getBoxCuffNewsItems();

            $photoGalleryRepository = new PhotoGalleryRepository();
            $photoGalleries = $photoGalleryRepository->getCuffPhotoGalleries();

            $videoGalleryRepository = new VideoGalleryRepository();
            $videoGalleries = $videoGalleryRepository->getCuffVideoGalleries();

            $recommendationNewsRepository = new RecommendationNewsRepository();
            $recommendationNewsItems = $recommendationNewsRepository->getCuffRecommendationNewsItems();

            Cache::tags(['Widget'])->rememberForever('widgets', function () {
                return WidgetManager::getAllWidgets();
            });

            $pageSetting = Setting::all();
            $modules = Module::enabled();

            return Theme::view('frontend.index', compact(
                'pageSetting',
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
