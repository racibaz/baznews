<?php

namespace App\Http\Controllers\Frontend;

use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArchiveController extends Controller
{
    private $repo;
    private $view = 'archive.';
    private $redirectViewName = 'frontend.';
    private $redirectRouteName = '';



    public function getViewName($methodName)
    {
        return $this->redirectViewName . $this->view . $methodName;
    }


    public function index()
    {
        $record = $this->repo->find(\Auth::user()->id);
        return Theme::view($this->getViewName(__FUNCTION__),compact('record'));
    }

}
