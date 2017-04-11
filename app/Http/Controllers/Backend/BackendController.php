<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\AdvertisementRepository;
use Auth;
use Log;
use Route;
use Illuminate\Support\Facades\Cache;

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

            Cache::tags(['Setting', 'Advertisement'])->rememberForever('advertisements', function () {

                $advertisementRepository = new AdvertisementRepository();
                $advertisements =  $advertisementRepository->where('is_active', 1)->findAll();

                foreach ($advertisements as $advertisement) {
                    Cache::tags(['Setting', 'Advertisement'])->forever($advertisement->name, $advertisement->code);
                }
            });

            return $next($request);
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
        $route =  Route::getCurrentRoute()->getAction();
        $routePathParts = explode('@',$route['controller']);

        $controllerPathParts = explode('\\',$routePathParts[0]);
        $partCount = count($controllerPathParts);
        $controllerName = $controllerPathParts[$partCount - 1];
        $methodName = $routePathParts[1];

        $classModelName = strtolower(substr($controllerName, 0 , -10));
        if(!Auth::user()->can($methodName . '-' . $classModelName)){
            Log::warning('Yetkisiz Alana Girmeye Çalışıldı. ' . 'Kişi : ' . Auth::user()->name . '  IP :' . Auth::user()->getUserIp() );
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
     */
    public function removeCacheKey($cacheName)
    {
        Cache::forget($cacheName);
    }


    /**
     * @param $cachetags
     */
    public function removeCacheTags($cachetags)
    {
        Cache::tags($cachetags)->flush();
    }


    public function removeHomePageCache()
    {
        Cache::tags('homePage')->flush();
    }


    //todo genel birşey yapılacak
//    public function toggleBooleanType( $record, string $key)
//    {
//        if($record->$key){
//            $record->$key =  0;
//        }else
//            $record->$key = 1;
//
//        $record->save();
//
//        return Redirect::back();
//    }
}
