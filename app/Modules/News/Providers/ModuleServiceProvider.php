<?php

namespace App\Modules\News\Providers;

use App\Modules\News\Models\News;
use App\Modules\News\Observers\NewsObserver;
use App\Modules\News\Repositories\NewsCategoryRepository;
use App\Modules\News\Repositories\NewsRepository;
use Cache;
use Caffeinated\Modules\Support\ServiceProvider;
use View;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/Lang', 'news');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'news');

        News::observe(NewsObserver::class);

        if (!app()->runningInConsole()) {

            Cache::tags(['NewsCategory', 'News'])->rememberForever('cuffNewsCategories', function () {
                View::share('cuffNewsCategories', app(NewsCategoryRepository::class)->getAllNewsCategoriesWithNews());
                View::share('breakNewsItems', app(NewsRepository::class)->getBreakNewsItems());
            });
        }
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
