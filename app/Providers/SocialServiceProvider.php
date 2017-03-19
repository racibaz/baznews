<?php

namespace App\Providers;

use App\Models\UserSocial;
use Illuminate\Support\ServiceProvider;

class SocialServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        UserSocial::observe(\App\Observers\UserSocialObserver::class);
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
