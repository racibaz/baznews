<?php

namespace App\Providers;

use App\Events\UserRegistered;
use App\Models\Setting;
use App\Models\User;
use App\Models\WidgetManager;
use App\Modules\News\Models\News;
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
        if(!app()->runningInConsole()) {

            //todo test edildikten sonra User modelinin içine alınamalı.
            User::created(function ($user) {
                if($user->status === 2){
                    $token = $user->activationToken()->create([
                        'token' => str_random(128),
                    ]);

                    event(new UserRegistered($user));
                }
            });

            //DB::getSchemaBuilder()->getColumnListing('settings');

            Cache::tags('Setting')->rememberForever('settings', function () {

                foreach (Setting::all() as $setting) {
                    Cache::tags('Setting')->forever($setting->attribute_key, $setting->attribute_value);
                }

                Cache::tags(['Setting', 'Menu'])->rememberForever('menus', function () {
                    $menuRepository = new MenuRepository();
                    return  $menuRepository->getMenus();
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
                View::share('widgets', WidgetManager::where('is_active',1)->orderBy('position','asc')->get() );

                //Cache::tags('settings')->flush();
                //Cache::flush();


                //todo cachle nerebilirnir.
                View::share('breakNewsItems', News::where('break_news', 1)
                    ->where('status', 1)
                    ->limit(Cache::tags('Setting')->get('break_news'))
                    ->get());

                //TODO cachelenecek
                View::share('activeTheme', Theme::getActive());

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
