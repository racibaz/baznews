<?php

namespace App\Modules\Article\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\Article\Repositories\ArticleAuthorRepository as Repo;
use Cache;

class ArticleAuthorController extends Controller
{
    public function __construct(Repo $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        return Cache::tags(['ArticleAuthorController', 'Article', 'articleAuthors'])->rememberForever('articleAuthors', function () {

            $records = $this->repo
                ->where('is_active', 1)
                ->findAll();

            return view('article::frontend.article_author.index', compact([
                'records',
            ]))->render();
        });
    }

    public function show($slug)
    {
        $id = substr(strrchr($slug, '-'), 1);
        return Cache::tags(['ArticleAuthorController', 'Article', 'articleAuthor'])->rememberForever('articleAuthor:' . $id, function () use ($id) {

            $record = $this->repo
                ->with([
                    'articles',
                ])
                ->where('is_active', 1)
                ->findBy('id', $id);


            $authorPhoto = $this->repo->getAuthorAvatar($record);

            return view('article::frontend.article_author.show', compact([
                'record',
                'authorPhoto'
            ]))->render();
        });
    }
}
