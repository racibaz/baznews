<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;


class DashboardController extends Controller
{

    private $model;
    private $view = '.dashboard.';
    private $redirectViewName = 'backend';
    private $redirectRouteName = 'admin';

//    public function __construct(CityRepositoryInterface $model)
//    {
//        $this->model= $model;
//    }

    public function getViewName($methodName)
    {
        return $this->redirectViewName . $this->view . $methodName;
    }


    public function index()
    {
        $records = User::all();

        dd($this->getViewName(__FUNCTION__));

        return view($this->getViewName(__FUNCTION__))
            ->with('records', $records);
    }
}
