<?php

namespace App\Modules\News\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\News\Models\News;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->q;
        $records = News::search($request->q)
            ->where('is_active',1)
            ->where('status',1)
            ->get();

        //TODO https://www.codecourse.com/lessons/laravel-scout/1050
        //SAYFALAMA DAN DEVAM EDİLEBİLİNİR.

        return Theme::view('news::frontend.news.search', compact([
            'records',
            'search'
        ]));
    }
}
