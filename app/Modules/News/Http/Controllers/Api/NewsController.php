<?php

namespace App\Modules\News\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\News\Transformers\NewsTransformer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Cache;
use App\Modules\News\Repositories\NewsRepository as Repo;
use Illuminate\Support\Facades\Input;

class NewsController extends Controller
{
    private $repo;

    public function __construct(Repo $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $input = Input::all();

        $sort = isset($input['sort']) ? $input['sort'] : 'id';
        $sortType = isset($input['sort_type']) ? $input['sort_type'] : 'asc';
        $filters = isset($input['filters']) ? $input['filters'] : "*";

        return Cache::tags('News','Api')->rememberForever('api.news.' . $sort . $sortType . $filters, function() use ($sort, $sortType, $filters) {

            if($filters == "*")
                $filters = ["*"];
            else
                $filters = explode(',', $filters);

            try{
                $records = $this->repo
                    ->where('status', 1)
                    ->where('is_active', 1)
                    ->orderBy($sort, $sortType)
                    ->findAll($filters);

                return  fractal()
                    ->collection($records)
                    ->transformWith(new NewsTransformer())
                    ->toJson();

            }catch (ModelNotFoundException $e){

                return response()->setStatusCode(404);
            }
        });
    }

    public function show($id)
    {
        return Cache::tags('News','Api')->rememberForever('api.newsItem'.$id, function() use ($id) {

            try{
                $record = $this->repo
                    ->with([
                        'news_categories',
                        'photo_galleries',
                        'video_galleries',
                        'photos',
                        'videos',
                        'related_news',
                        'country',
                        'city',
                        'news_source',
                        'tags',
                        'user'
                    ])
                    ->where('status', 1)
                    ->where('is_active', 1)
                    ->findBy('id',$id);

                return  fractal()
                    ->item($record)
                    ->parseIncludes([
                        ($record->is_show_editor_profile) ? 'user': '',
                        ($record->country) ? 'country': '',
                        ($record->city) ? 'city': '',
                        ($record->news_source) ? 'news_source': '',
                        'news_categories',
                        ($record->video_galleries->count()) ? 'video_galleries': '',
                        ($record->photo_galleries->count()) ? 'photo_galleries': '',
                        ($record->photos->count()) ? 'photos': '',
                        ($record->videos->count()) ? 'videos': '',
                        ($record->related_news->count()) ? 'related_news': ''
                    ])
                    ->transformWith(new NewsTransformer())
                    ->toArray();

            }catch (ModelNotFoundException $e){

                return response()->setStatusCode(404);
            }
        });
    }
}
