<?php

namespace App\Providers;

use App\Models\Announcement;
use App\Models\City;
use App\Models\Country;
use App\Models\Group;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Observers\AnnouncementObserver;
use App\Observers\CityObserver;
use App\Observers\CountryObserver;
use App\Observers\GroupObserver;
use App\Observers\PermissionObserver;
use App\Observers\RoleObserver;
use App\Observers\UserObserver;
use Caffeinated\Themes\Facades\Theme;
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
        if($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
