<?php

namespace App\Providers;

use App\Events\UserRegistered;
use App\Models\Setting;
use App\Models\User;
use App\Models\WidgetManager;
use App\Repositories\AdvertisementRepository;
use App\Repositories\MenuRepository;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
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
        if(!app()->runningInConsole() && \Schema::hasTable('settings')) {

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
                    return  $menuRepository->with(['page'])->where('is_active', 1)->orderBy('order','asc')->findAll();
                });

            });


            /*todo
             *
             * widget_manager , widget group ile ilişkili olduğunda performans açısından sorun olabilir
             * bunu için widger manager a string olarak değer versek nasıl olur?
             * widget alanlarında sorgulamaları nasıl yapmammız gerekiyor?
             * */
            View::share('widgets', WidgetManager::where('is_active',1)->orderBy('position','asc')->get() );

            //Cache::tags('settings')->flush();
            //Cache::flush();


            //TODO cachelenecek
            View::share('activeTheme', Theme::getActive());
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
