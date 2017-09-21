<?php

namespace App\Modules\News\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\News\Repositories\NewsCategoryRepository as Repo;
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
        $records = $this->repo->getAllNewsCategories();
        return view('news::' . $this->getViewName(__FUNCTION__), compact(['records']));
    }

    public function getNewsByNewsCategorySlug($newsCategorySlug)
    {
        return Cache::tags(['NewsCategoryController', 'News', 'NewsCategory'])->rememberForever(request()->fullUrl(), function () use ($newsCategorySlug) {

            $newsCategorySlug = removeHtmlTagsOfField($newsCategorySlug);
            $newsCategory = $this->repo
                ->with(['news'])
                ->where('is_active', 1)
                ->findBy('slug', $newsCategorySlug);

            abort_if(!$newsCategory,404,'The specified News Category cannot be found');

            $records = $newsCategory->news()->paginate();

            return view('news::frontend.news_category.category_news', compact([
                'newsCategory',
                'records'
            ]))->render();
        });
    }
}
