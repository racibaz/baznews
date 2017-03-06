<?php

namespace App\Providers;

use App\Events\UserRegistered;
use App\Models\Setting;
use App\Models\User;
use App\Models\WidgetManager;
use App\Repositories\AdvertisementRepository;
use App\Repositories\MenuRepository;
use Theme;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        if(!app()->runningInConsole() && \Schema::hasTable('settings') && \Schema::hasTable('menus') && \Schema::hasTable('advertisements') && \Schema::hasTable('widget_managers')) {
        if(!app()->runningInConsole() && \Schema::hasTable('settings')) {
//            if(!app()->runningInConsole()) {

                User::created(function ($user) {
                    $token = $user->activationToken()->create([
                        'token' => str_random(128),
                    ]);

                    event(new UserRegistered($user));
                });

                //DB::getSchemaBuilder()->getColumnListing('settings');


                Cache::remember('settings', 10, function () {

                    $settings = Setting::all();

                    foreach ($settings as $setting) {
    //                    Cache::tags(['settings'])->put($setting->attribute_key, $setting->attribute_value, 10);
                        Redis::set($setting->attribute_key, $setting->attribute_value);
                        //Redis::expire($setting->attribute_key, 1);
                    }
                    //return 'setting';


                    Cache::remember('menus', 10, function () {
                        $menuRepository = new MenuRepository();
                        return  $menuRepository->with(['page'])->where('is_active', 1)->orderBy('order','asc')->findAll();
                    });

                    Cache::remember('advertisements', 10, function () {

                        $advertisementRepository = new AdvertisementRepository();
                        $advertisements =  $advertisementRepository->where('is_active', 1)->findAll();

                        foreach ($advertisements as $advertisement) {
    //                     Cache::tags(['settings'])->put($setting->attribute_key, $setting->attribute_value, 10);
                            Cache::forever($advertisement->name, $advertisement->code);
                        }
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
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
