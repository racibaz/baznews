<?php

namespace App\Modules\News\Providers;

use App\Modules\News\Repositories\NewsCategoryRepository;
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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'news');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'news');

        if(!app()->runningInConsole()) {

            Cache::tags('NewsCategory', 'News')->rememberForever('cuffNewsCategories', function () {

                if(! \Schema::hasTable('news')) {
                    return null;
                }

                $newsCategoryRepository = new NewsCategoryRepository();
                $cuffNewsCategories = $newsCategoryRepository->with(['news'])->where('is_cuff', 1)->where('is_active', 1)->findAll();
                return View::share('cuffNewsCategories', $cuffNewsCategories);
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
