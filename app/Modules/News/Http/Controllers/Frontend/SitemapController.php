<?php

namespace App\Modules\News\Http\Controllers\Frontend;

use App\Modules\News\Models\News;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SitemapController extends Controller
{
    public function sitemap()
    {
        $newsItems = News::where('is_active', 1)->orderBy('updated_at', 'desc')->get();

        return Theme::response('modules.news.frontend.sitemap.sitemap', compact('newsItems'), 200, [
            'Content-Type' => 'text/xml'
        ]);
    }
}
