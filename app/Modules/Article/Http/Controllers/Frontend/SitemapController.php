<?php

namespace App\Modules\Article\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Modules\Article\Models\Article;
use Caffeinated\Themes\Facades\Theme;

class SitemapController extends Controller
{
    public function sitemap()
    {
        $articles = Article::where('is_active', 1)->orderBy('updated_at', 'desc')->get()->take(1000);
        
        return Theme::response('modules.article.frontend.sitemap.sitemap', compact('articles'), 200, [
                        'Content-Type' => 'text/xml'
            ]);
    }
}
