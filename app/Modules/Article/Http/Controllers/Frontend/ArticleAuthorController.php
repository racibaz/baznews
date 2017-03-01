<?php

namespace App\Modules\Article\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\Article\Repositories\ArticleAuthorRepository as Repo;
use Cache;
use Caffeinated\Themes\Facades\Theme;

class ArticleAuthorController extends Controller
{
    public function __construct(Repo $repo)
    {
        $this->repo= $repo;
    }

    public function index()
    {
        return Cache::remember('articleAuthors', 100, function() {

            $records = $this->repo
                ->where('is_active', 1)
                ->findAll();

            return Theme::view('article::frontend.article_author.index', compact([
                'records',
            ]))->render();
        });
    }

    public function show($slug)
    {
        $id =  substr(strrchr($slug, '-'), 1 );
        return Cache::remember('articleAuthor:'.$id, 100, function() use($id) {

            $record = $this->repo
                ->with([
                    'articles',
                ])
                ->where('is_active', 1)
                ->findBy('id',$id);

            return Theme::view('article::frontend.article_author.show', compact([
                'record',
            ]))->render();
        });
    }
}
