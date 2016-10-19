<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Sitemap;
use Caffeinated\Modules\Facades\Module;
use Caffeinated\Themes\Facades\Theme;

class SitemapController extends Controller
{
    public function sitemaps()
    {
        $modules = Module::enabled();

        $sitemaps = Sitemap::where('is_active', 1)->get();

        
        return Theme::response('frontend.sitemap.sitemap', compact('sitemaps'), 200, [
                'Content-Type' => 'text/xml'
            ]);
    }
}
