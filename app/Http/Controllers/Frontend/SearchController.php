<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class SearchController extends Controller
{
    public function tagSearch($q)
    {
        $search = $q;
        $record = Tag::where('slug',$q)->first();

        //TODO https://www.codecourse.com/lessons/laravel-scout/1050
        //SAYFALAMA DAN DEVAM EDİLEBİLİNİR.

        return view('frontend.tag.tag_search', compact([
            'record',
            'search'
        ]));
    }
}
