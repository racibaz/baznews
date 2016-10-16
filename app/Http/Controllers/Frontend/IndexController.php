<?php

namespace App\Http\Controllers\Frontend;

use App\Modules\News\Models\News;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    public function index()
    {

        $records =  Cache::remember('index', 10, function() use () {

            $records = News::where('is_active',1)->get();

            return $records;
        });

        //return $this->response->collection($records, new BookTransformer() )->setStatusCode(200);

        return Theme::view('frontend.index',compact('records'));
    }
}
