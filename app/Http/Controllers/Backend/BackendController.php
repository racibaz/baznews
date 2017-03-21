<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Log;
use Route;

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
            return $next($request);
        });
    }

    public function checkPermission()
    {
        $route =  Route::getCurrentRoute()->getAction();
        $routePathParts = explode('@',$route['controller']);

        $controllerPathParts = explode('\\',$routePathParts[0]);
        $partCount = count($controllerPathParts);
        $controllerName = $controllerPathParts[$partCount - 1];
        $methodName = $routePathParts[1];

//        foreach (explode('\\', $controllerName) as $className) {}
        $classModelName = strtolower(substr($controllerName, 0 , -10));
        if(!Auth::user()->can($methodName . '-' . $classModelName)){
            Log::warning('Yetkisiz Alana Girmeye Çalışıldı. ' . 'Kişi : ' . Auth::user()->name . '  IP :' . Auth::user()->getUserIp() );
            abort(403, 'Unauthorized action.');
        }
        return true;
    }


    public function getViewName($methodName)
    {
        return $this->redirectViewName . $this->view . $methodName;
    }


    public function removeCacheKey($cacheName)
    {
        Cache::forget($cacheName);
    }

    //array $cachetags
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
