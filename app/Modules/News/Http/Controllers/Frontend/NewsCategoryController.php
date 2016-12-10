<?php

namespace App\Modules\News\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\News\Repositories\NewsCategoryRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Support\Facades\Cache;

class NewsCategoryController extends Controller
{
    private $repo;
    private $view = 'news_category.';
    private $redirectViewName = 'frontend.';
    private $redirectRouteName = '';

    public function __construct(Repo $repo)
    {
        $this->repo = $repo;
    }

    public function getViewName($methodName)
    {
        return $this->redirectViewName . $this->view . $methodName;
    }


    public function index()
    {
        $records = $this->repo->orderBy('updated_at', 'desc')->findAll();
        return Theme::view('news::' . $this->getViewName(__FUNCTION__), compact(['records']));
    }


    public function getNewsByNewsCategorySlug($newsCategorySlug)
    {
        return Cache::remember('news:'.$newsCategorySlug, 100, function() use($newsCategorySlug) {

            $newsCategorySlug = htmlentities(strip_tags($newsCategorySlug), ENT_QUOTES, 'UTF-8');
            $records = $this->repo
                    ->where('is_active', 1)
                    ->findBy('slug',$newsCategorySlug)
                    ->news;

            return Theme::view('news::frontend.news_category.category_news', compact([
                'records'
            ]))->render();
        });

    }


    public function show($newsCategorySlug)
    {
        return Cache::remember('news:'.$newsCategorySlug, 100, function() use($newsCategorySlug) {

            $newsCategorySlug = htmlentities(strip_tags($newsCategorySlug), ENT_QUOTES, 'UTF-8');
            $record = $this->repo
                ->where('is_active', 1)
                ->findBy('slug',$newsCategorySlug);

            $records = $record->news;


            return Theme::view('news::frontend.news_category.show', compact([
                'record'
            ]))->render();
        });
    }

}
