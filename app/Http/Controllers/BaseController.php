<?php
/**
 * Created by PhpStorm.
 * User: recai.cansiz
 * Date: 25.07.2017
 * Time: 15:33
 */

namespace App\Http\Controllers;


use App\Repositories\CityRepository;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    /**
     * Show the application selectAjax.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function getCitiesByCountryId(Request $request)
    {
        if($request->ajax()){
            $cityRepo = new CityRepository();
            return $cityRepo->getCitiesByCountryId(strip_tags($request->country_id));
        }
    }
}