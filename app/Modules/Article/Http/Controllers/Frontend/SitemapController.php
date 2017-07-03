<?php

namespace App\Modules\Article\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\Article\Repositories\ArticleRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Support\Facades\Cache;

class SitemapController extends Controller
{
    public function __construct(Repo $repo)
    {
        $this->repo = $repo;
    }

    public function sitemap()
    {
        $articles = Cache::tags(['ArticleController', 'Article', 'sitemap'])->rememberForever('sitemap:article', function () {
            return $this->repo->getLastArticles();
        });

        return Theme::response('modules.article.frontend.sitemap.sitemap', compact('articles'), 200, [
            'Content-Type' => 'text/xml'
        ]);
    }
}
