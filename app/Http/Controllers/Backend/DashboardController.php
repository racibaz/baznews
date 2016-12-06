<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Menu;
use App\Models\Page;
use App\Models\User;
use Theme;


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
        $activeUserCount= User::where('status',1)->get()->count();
        //todo farklı statusler de gelmeli.

        $activeGroupCount = Group::where('is_active',1)->get()->count();
        $passiveGroupCount = Group::where('is_active',0)->get()->count();

        $activePageCount = Page::where('is_active',1)->get()->count();
        $passivePageCount = Page::where('is_active',0)->get()->count();

        $activeMenuCount = Menu::where('is_active',1)->get()->count();
        $passiveMenuCount = Menu::where('is_active',0)->get()->count();


        dd($activeUserCount);

//        dd($this->getViewName(__FUNCTION__));

        return Theme::view($this->getViewName(__FUNCTION__),compact('records'));
    }
}
