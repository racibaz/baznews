<?php

namespace App\Modules\News\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\News\Repositories\NewsRepository as Repo;
use Illuminate\Support\Facades\Cache;

class SitemapController extends Controller
{

    public function __construct(Repo $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function sitemap()
    {
        $newsItems = Cache::tags(['NewsController', 'News', 'sitemap'])->rememberForever('sitemap:news', function () {
            return $this->repo->getLastNewsItems();
        });

        return response()
            ->view('news::frontend.sitemap.sitemap', compact('newsItems'), 200)
            ->header('Content-Type', 'text/xml');
    }
}
