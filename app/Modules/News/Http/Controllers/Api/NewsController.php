<?php

namespace App\Modules\News\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\News\Models\News;
use App\Modules\News\Transformers\NewsTransformer;
use Illuminate\Support\Facades\Cache;

class NewsController extends Controller
{
    public function show($id)
    {
        return  Cache::tags('News','Api')->rememberForever('newsItem'.$id, function() use ($id) {

            $news = News::where('id', $id)->where('status', 1)->first();

            return fractal()
                ->item($news)
                ->parseIncludes(['user', 'country', 'city', 'news_source'])
                ->transformWith(new NewsTransformer())
                ->toArray();
        });
    }
}
