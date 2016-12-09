<?php

namespace App\Http\Controllers;

use Auth;
use Caffeinated\Themes\Facades\Theme;
use Log;
use Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * Controller constructor.
     *
     * Set Caffeinated\Themes Plugin theme name
     *
     */
    public function __construct()
    {
//        Theme::setActive('news-theme');
    }

    /**
     * @param $method_name
     * @param $class_model_name
     * @return bool
     */
    public function permisson_check()
    {
        $route =  Route::getCurrentRoute()->getAction();
        $routePathParts = explode('@',$route['controller']);

        $controllerPathParts = explode('\\',$routePathParts[0]);
        $partCount = count($controllerPathParts);
        $controllerName = $controllerPathParts[$partCount - 1];
        $methodName = $routePathParts[1];

//        foreach (explode('\\', $controllerName) as $className) {}
        $classModelName = strtolower(substr($controllerName, 0 , -10));


//        dd(Auth::check()  );


        if(!Auth::user()->can($methodName . '-' . $classModelName)){
            Log::warning('Yetkisiz Alana Girmeye Çalışıldı. ' . 'Kişi : ' . Auth::user()->UserFullName() . '  IP :' . Auth::user()->getUserIp() );
            dd('yetkisiz');
        }
        return true;
    }
}
