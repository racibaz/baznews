<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\AdvertisementRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;

class BackendController extends Controller
{
    protected $view, $redirectViewName, $redirectRouteName;

    /**
     * Controller constructor.
     *
     * Set permisson_check method
     *
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->checkPermission();

            $this->setAdvertisement();

            return $next($request);
        });
    }


    /**
     *
     */
    private function setAdvertisement()
    {
        Cache::tags(['Setting', 'Advertisement'])->rememberForever('advertisements', function () {

            $advertisements = app(AdvertisementRepository::class)->where('is_active', 1)->findAll();

            foreach ($advertisements as $advertisement) {
                Cache::tags(['Setting', 'Advertisement'])->forever($advertisement->name, $advertisement->code);
            }
        });
    }


    /**
     *
     * Check user permission with controller name and method name
     *
     * @return bool
     */
    public function checkPermission()
    {
        $route = Route::getCurrentRoute()->getAction();
        $routePathParts = explode('@', $route['controller']);

        $controllerPathParts = explode('\\', $routePathParts[0]);
        $partCount = count($controllerPathParts);
        $controllerName = $controllerPathParts[$partCount - 1];
        $methodName = $routePathParts[1];

        $classModelName = strtolower(substr($controllerName, 0, -10));
        if (!Auth::user()->can($methodName . '-' . $classModelName)) {
            Log::warning('Yetkisiz Alana Girmeye Çalışıldı. ' . 'Kişi : ' . Auth::user()->name . '  IP :' . Auth::user()->getUserIp());
            abort(403, 'Unauthorized action.');
        }
        return true;
    }


    /**
     * @param $methodName
     * @return string
     */
    public function getViewName($methodName)
    {
        return $this->redirectViewName . $this->view . $methodName;
    }


    /**
     * @param $cacheName
     * @return mixed
     */
    public function removeCacheKey($cacheName)
    {
        return Redis::del($cacheName);
    }


    /**
     * @param $cacheTags
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeCacheTags($cacheTags)
    {
        Cache::tags($cacheTags)->flush();
        return redirect()->back();
    }

    public function removeHomePageCache()
    {
        Cache::tags('homePage')->flush();
    }

    public function removeHomePageCacheWithRedirect()
    {
        $this->removeHomePageCache();

        return redirect()->route('dashboard');
    }
}
