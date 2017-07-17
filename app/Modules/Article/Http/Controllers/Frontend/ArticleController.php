<?php

namespace App\Modules\Article\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\Article\Repositories\ArticleRepository as Repo;
use App\Modules\Article\Repositories\ArticleAuthorRepository as ArticleAuthor;
use Cache;
use Caffeinated\Themes\Facades\Theme;

class ArticleController extends Controller
{
    public function __construct(Repo $repo, ArticleAuthor $authorRepo)
    {
        $this->repo = $repo;
        $this->authorRepo = $authorRepo;
    }

    public function show($slug)
    {
        $id = substr(strrchr($slug, '-'), 1);
        return Cache::tags(['ArticleController', 'Article', 'article'])->rememberForever('article:' . $id, function () use ($id) {

            $record = $this->repo
                ->with([
                    'article_categories',
                    'article_author',
                    'user',
                ])
                ->where('is_active', 1)
                ->findBy('id', $id);

            $otherArticles = $this->repo
                ->with([
                    'article_categories',
                    'article_author',
                    'user',
                ])
                ->where('is_active', 1)
                ->findAll()
                ->take(5);

            $authorPhoto = $this->authorRepo->getAuthorAvatar($record->article_author);

            return Theme::view('article::frontend.article.show', compact([
                'record',
                'otherArticles',
                'authorPhoto'
            ]))->render();
        });
    }
}
