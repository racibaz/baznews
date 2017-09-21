<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\WidgetManager;
use App\Modules\News\Models\News;
use App\Modules\News\Repositories\NewsRepository;
use App\Repositories\AdvertisementRepository;
use App\Repositories\MenuRepository;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;

class BaznewsServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!app()->runningInConsole()) {

            Cache::tags('Setting')->rememberForever('settings', function () {

                foreach (Setting::all() as $setting) {
                    Cache::tags('Setting')->forever($setting->attribute_key, $setting->attribute_value);
                }

                Cache::tags(['Setting', 'Menu'])->rememberForever('header_menus', function () {
                    $menuRepository = new MenuRepository();
                    return $menuRepository->getHeaderMenus();
                });

                Cache::tags(['Setting', 'Menu'])->rememberForever('footer_menus', function () {
                    $menuRepository = new MenuRepository();
                    return $menuRepository->getFooterMenus();
                });

                Cache::tags(['Setting', 'Advertisement'])->rememberForever('advertisements', function () {
                    $repo = new AdvertisementRepository();
                    foreach ($repo->advertisements() as $advertisement) {
                        Cache::tags('Setting', 'Advertisement')->forever($advertisement->name, $advertisement->code);
                    }
                });

                /*todo
                 *
                 * //todo cachle nerebilirnir.
                 * widget_manager , widget group ile ilişkili olduğunda performans açısından sorun olabilir
                 * bunu için widger manager a string olarak değer versek nasıl olur?
                 * widget alanlarında sorgulamaları nasıl yapmammız gerekiyor?
                 * */
                View::share('widgets', WidgetManager::where('is_active', 1)->orderBy('position', 'asc')->get());


                $newsRepo = new NewsRepository();
                View::share('breakNewsItems', $newsRepo->getBreakNewsItems());


                Cache::tags(['Setting', 'Advertisement'])->rememberForever('breakNewsItems', function () {
                    $repo = new AdvertisementRepository();
                    $repo->putCacheAdvertisementItems();
                });

                //TODO tema içerisinde misal js, css veya diğer gereksiz yerlerden bu değişken kaldırılmalı
                View::share('activeTheme', Theme::getCurrent());

                View::share('themeAssetsPath', 'themes/news-theme/assets/' );
            });
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
