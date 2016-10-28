<?php

namespace App\Modules\News\Http\Controllers\Frontend;

use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Modules\News\Repositories\NewsRepository as Repo;
use Illuminate\Support\Facades\Cache;

class NewsController extends Controller
{

//    private $repo;
//    private $view = 'news.';
//    private $redirectViewName = 'frontend.';
//    private $redirectRouteName = '';
//
//    public function __construct(Repo $repo)
//    {
//        $this->repo = $repo;
//    }
//
//    public function getViewName($methodName)
//    {
//        return $this->redirectViewName . $this->view . $methodName;
//    }
//
//
//    public function index()
//    {
//        $records = $this->repo->orderBy('updated_at', 'desc')->findAll();
//        return Theme::view('news::' . $this->getViewName(__FUNCTION__), compact(['records']));
//    }
//
//
//    public function getNewsBySlug($slug)
//    {
//        return Cache::remember('news:'.$slug, 100, function() use($slug) {
//
//            $slug = htmlentities(strip_tags($slug), ENT_QUOTES, 'UTF-8');
//            $record = $this->repo->where('status', 1)->findBy('slug',$slug);
//
//            return Theme::view('news::frontend.news.getNewsBySlug', compact(['record']))->render();
//        });
//
//    }


}
