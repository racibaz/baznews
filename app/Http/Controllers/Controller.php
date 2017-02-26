<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Log;
use Route;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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

        if(!Auth::user()->can($methodName . '-' . $classModelName)){
            Log::warning('Yetkisiz Alana Girmeye Çalışıldı. ' . 'Kişi : ' . Auth::user()->UserFullName() . '  IP :' . Auth::user()->getUserIp() );
            abort(403, 'Unauthorized action.');
        }
        return true;
    }
}
