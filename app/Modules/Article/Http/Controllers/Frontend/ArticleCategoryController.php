<?php

namespace App\Modules\Article\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\Article\Repositories\ArticleCategoryRepository as Repo;
use Cache;

class ArticleCategoryController extends Controller
{
    public function __construct(Repo $repo)
    {
        $this->repo = $repo;
    }

    public function show($slug)
    {
        return Cache::tags(['ArticleCategoryController', 'Article', 'categoryArticles'])->rememberForever('categoryArticles:' . $slug, function () use ($slug) {
            $slug = removeHtmlTagsOfField($slug);

            try{
                $record = $this->repo
                    ->with([
                        'articles',
                    ])
                    ->where('is_active', 1)
                    ->findBy('slug', $slug);

            }catch(\Exception $e){
                abort(404);
            }

            return view('article::frontend.article_category.show', compact([
                'record',
            ]))->render();
        });
    }
}
