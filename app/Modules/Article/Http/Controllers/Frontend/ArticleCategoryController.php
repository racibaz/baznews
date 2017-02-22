<?php

namespace App\Modules\Article\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\Article\Repositories\ArticleCategoryRepository as Repo;
use Cache;
use Caffeinated\Themes\Facades\Theme;

class ArticleCategoryController extends Controller
{
    public function __construct(Repo $repo)
    {
        $this->repo= $repo;
    }

    public function show($slug)
    {
        return Cache::remember('categoryArticles:'.$slug, 100, function() use($slug) {
            $slug = htmlentities(strip_tags($slug), ENT_QUOTES, 'UTF-8');
            $record = $this->repo
                ->with([
                    'articles',
                ])
                ->where('is_active', 1)
                ->findBy('slug',$slug);

            dd($record);


            return Theme::view('article::frontend.article_category.show', compact([
                'record',
            ]))->render();
        });
    }
}
