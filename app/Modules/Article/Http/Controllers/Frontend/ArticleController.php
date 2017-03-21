<?php

namespace App\Modules\Article\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\Article\Repositories\ArticleRepository as Repo;
use Cache;
use Caffeinated\Themes\Facades\Theme;

class ArticleController extends Controller
{
    public function __construct(Repo $repo)
    {
        $this->repo= $repo;
    }

    public function show($slug)
    {
        $id =  substr(strrchr($slug, '-'), 1 );
        return Cache::tags(['ArticleController', 'Article', 'article'])->rememberForever('article:'.$id, function() use($id) {

            $record = $this->repo
                ->with([
                    'article_categories',
                    'article_author',
                    'user',
                ])
                ->where('status', 1)
                ->where('is_active', 1)
                ->findBy('id',$id);

            return Theme::view('article::frontend.article.show', compact([
                'record',
            ]))->render();
        });
    }
}
