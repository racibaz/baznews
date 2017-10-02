<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $search = strip_tags($request->q);
        $results = [];
        $counter = 0;

        $searchLists = DB::table('search_lists')
            ->where('is_active', 1)
            ->groupBy(['class_path','field'])
            ->get();


        foreach ($searchLists as $index => $searchList){

            $fields = ['id',$searchList->field];
            if($searchList->is_require_slug)
                array_push($fields,'slug');

            $tableName = app($searchList->class_path)->getTable();
            $data = DB::table($tableName)->where($searchList->field, 'like', "%$search%")->get($fields);

            if(count($data) > 0){
                $results[$counter]['data'] = $data;
                $results[$counter]['meta_data'] = $searchList;
                $counter = ++$counter;
            }
        }

        return view('frontend.search.index', compact([
            'results',
            'search'
        ]));
    }



    public function tagSearch($q)
    {
        $search = $q;
        $record = Tag::where('slug',$q)->first();

        //TODO https://www.codecourse.com/lessons/laravel-scout/1050
        //SAYFALAMA DAN DEVAM EDİLEBİLİNİR.

        return view('frontend.search.tag_search', compact([
            'record',
            'search'
        ]));
    }
}
