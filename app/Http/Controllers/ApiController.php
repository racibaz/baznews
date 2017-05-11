<?php
/**
 * Created by PhpStorm.
 * User: recai.cansiz
 * Date: 9.05.2017
 * Time: 22:15
 */
namespace App\Http\Controllers;

use App\Traits\ApiResponser;

class ApiController extends Controller
{
    use ApiResponser;

    public function __construct()
    {
//        $this->middleware('auth:api');
    }
}