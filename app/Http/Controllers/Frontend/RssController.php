<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Rss;

class RssController extends Controller
{
    public function rssRender()
    {
        $rssItems = Rss::where('is_active', 1)->get();

        return view('frontend.rss.rss', compact(['rssItems']));
    }
}
