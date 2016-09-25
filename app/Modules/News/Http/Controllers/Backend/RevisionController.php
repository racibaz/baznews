<?php

namespace App\Modules\News\Http\Controllers\Backend;

use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RevisionController extends Controller
{

    private $repo;
    private $view = 'recommendation_news.';
    private $redirectViewName = 'backend.';
    private $redirectRouteName = '';

    public function index()
    {
        //$records = $this->repo->orderBy('updated_at', 'desc')->findAll();
        return Theme::view('news::' . $this->getViewName(__FUNCTION__),compact(['records']));
    }
}
