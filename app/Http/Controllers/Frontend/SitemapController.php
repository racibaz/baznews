<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Sitemap;
use Caffeinated\Modules\Facades\Module;
use Illuminate\Support\Facades\Cache;

class SitemapController extends Controller
{
    public function sitemaps()
    {
        //todo repo eklendiğinde repodan çekilmeli.
        $sitemaps = Cache::tags(['SitemapController', 'Sitemap', 'sitemap'])->rememberForever('sitemap', function () {
            $modules = Module::enabled();

            return Sitemap::where('is_active', 1)->get();
        });

        return response()
            ->view('frontend.sitemap.sitemap', compact('sitemaps'), 200)
            ->header('Content-Type', 'text/xml');
    }
}
