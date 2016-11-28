<?php

namespace App\Modules\News\Http\Controllers\Frontend;

use App\Modules\News\Models\News;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $records = News::search($request->q)
            ->where('is_active',1)
            ->where('status',1)
            ->get();

        //TODO https://www.codecourse.com/lessons/laravel-scout/1050
        //SAYFALAMA DAN DEVAM EDİLEBİLİNİR.
        dd($records);
    }
}
