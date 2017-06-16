<?php

namespace App\Modules\News\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Caffeinated\Themes\Facades\Theme;
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
        $newsItems = Cache::tags(['NewsController', 'News', 'sitemap'])->rememberForever('sitemap:news', function(){
            return  $this->repo->getLastNews();
        });

        return Theme::response('modules.news.frontend.sitemap.sitemap', compact('newsItems'), 200, [
            'Content-Type' => 'text/xml'
        ]);
    }
}
