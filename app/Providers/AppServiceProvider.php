<?php

namespace App\Providers;

use App\Models\Setting;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Support\Facades\Cache;
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

//        Cache::remember('settings', 10, function() {
//
//            $settings =  Setting::all();
//
//            foreach ($settings as $setting)
//            {
//                Cache::tags(['settings'])->put($setting->attribute_key, $setting->attribute_value, 10);
//                //Redis::set($setting->attribute_key, $setting->attribute_value);
//                //Redis::expire($setting->attribute_key, 1);
//            }
//            //return 'setting';
//        });


        //Cache::tags('settings')->flush();
        //Cache::flush();


        //TODO cachelenecek
        View::share('activeTheme', Theme::getActive());

//        User::observe(UserObserver::class);
//        Country::observe(CountryObserver::class);
//        City::observe(CityObserver::class);
//        Role::observe(RoleObserver::class);
//        Group::observe(GroupObserver::class);
//        Permission::observe(PermissionObserver::class);
//        Announcement::observe(AnnouncementObserver::class);

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
