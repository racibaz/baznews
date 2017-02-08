<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //
        Route::pattern('id', '[0-9]+');

        parent::boot();

        Route::model('country', 'App\Models\Country');
        Route::model('city', 'App\Models\City');
        Route::model('user', 'App\Models\User');
        Route::model('role', 'App\Models\Role');
        Route::model('permission', 'App\Models\Permission');
        Route::model('group', 'App\Models\Group');
        Route::model('announcement', 'App\Models\Announcement');
        Route::model('page', 'App\Models\Page');
        Route::model('menu', 'App\Models\Menu');
        Route::model('language', 'App\Models\Language');
        Route::model('contact_type', 'App\Models\ContactType');
        Route::model('contact', 'App\Models\Contact');
        Route::model('setting', 'App\Models\Setting');
        Route::model('tag', 'App\Models\Tag');
        Route::model('event', 'App\Models\Event');
        Route::model('module_manager', 'App\Models\ModuleManager');
        Route::model('sitemap', 'App\Models\Sitemap');
        Route::model('rss', 'App\Models\Rss');
        Route::model('widget_manager', 'App\Models\WidgetManager');
        Route::model('theme_manager', 'App\Models\ThemeManager');
        Route::model('account', 'App\Models\Account');
        Route::model('advertisement', 'App\Models\Advertisement');
        Route::model('widget_group', 'App\Models\WidgetGroup');
        
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();

        $this->mapApiRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/web.php');
        });
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::group([
            'middleware' => 'api',
            'namespace' => $this->namespace,
            'prefix' => 'api',
        ], function ($router) {
            require base_path('routes/api.php');
        });
    }
}
