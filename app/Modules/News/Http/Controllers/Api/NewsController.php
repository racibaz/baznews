<?php

namespace App\Modules\News\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\News\Models\News;
use App\Modules\News\Transformers\NewsTransformer;
use Dingo\Api\Routing\Helpers;
use Illuminate\Support\Facades\Cache;

class NewsController extends Controller
{
    use Helpers;

    public function getNews($count = null)
    {
        $records =  Cache::remember('getNews', 10, function() use ($count) {

            if($count != null) {

                $records = News::where('is_active', 1)->take($count)->get();

            }else {

                $records = News::where('is_active', 1)->get();
            }

            return $records;
        });

        return $this->response->collection($records, new NewsTransformer() )->setStatusCode(200);
    }

    public function getNewsById($id)
    {
        $record =  Cache::remember('getNewsById-'.$id, 10, function() use ($id) {

            return  News::where('id', $id)->where('is_active', 1)->first();
        });

        return $this->response->item($record, new NewsTransformer() )->setStatusCode(200);
    }

}
