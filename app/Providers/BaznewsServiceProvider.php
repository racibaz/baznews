<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\WidgetManager;
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
                    return app(MenuRepository::class)->getHeaderMenus();
                });

                Cache::tags(['Setting', 'Menu'])->rememberForever('footer_menus', function () {
                    return app(MenuRepository::class)->getFooterMenus();
                });

                Cache::tags(['Setting', 'Advertisement'])->rememberForever('advertisements', function () {
                    foreach (app(AdvertisementRepository::class)->advertisements() as $advertisement) {
                        Cache::tags('Setting', 'Advertisement')->forever($advertisement->name, $advertisement->code);
                    }
                });

                Cache::tags(['Setting', 'Advertisement'])->rememberForever('breakNewsItems', function () {
                    app(AdvertisementRepository::class)->putCacheAdvertisementItems();
                });

                //set language
                app()->setLocale(Cache::tags('Setting')->get('language_code'));

                Cache::tags('Setting')->forever('FACEBOOK_CLIENT_ID', env('FACEBOOK_CLIENT_ID'));
                Cache::tags('Setting')->forever('TWITTER_CLIENT_ID', env('TWITTER_CLIENT_ID'));
                Cache::tags('Setting')->forever('GOOGLE_CLIENT_ID', env('GOOGLE_CLIENT_ID'));

                //set theme
                Theme::set(env('ACTIVE_THEME'));
                View::share('activeTheme', Theme::getCurrent());
                View::share('themeAssetsPath', 'themes/' . Theme::getCurrent() . '/assets/');
                View::share('widgets', WidgetManager::where('is_active', 1)->orderBy('position', 'asc')->get());
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
