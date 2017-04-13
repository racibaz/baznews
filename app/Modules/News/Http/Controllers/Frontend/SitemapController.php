<?php

namespace App\Modules\News\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\News\Models\News;
use Caffeinated\Themes\Facades\Theme;

class SitemapController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function sitemap()
    {
        $newsItems = News::where('status', 1)->where('is_active', 1)->orderBy('updated_at', 'desc')->get();

        return Theme::response('modules.news.frontend.sitemap.sitemap', compact('newsItems'), 200, [
            'Content-Type' => 'text/xml'
        ]);
    }
}
