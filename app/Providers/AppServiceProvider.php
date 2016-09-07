<?php

namespace App\Providers;

use App\Models\City;
use App\Models\Country;
use App\Models\Role;
use App\Models\User;
use App\Observers\CityObserver;
use App\Observers\CountryObserver;
use App\Observers\RoleObserver;
use App\Observers\UserObserver;
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
        User::observe(UserObserver::class);
        Country::observe(CountryObserver::class);
        City::observe(CityObserver::class);
        Role::observe(RoleObserver::class);
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
