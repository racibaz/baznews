<?php

namespace App\Modules\News\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\News\Transformers\NewsTransformer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Modules\News\Repositories\NewsRepository as Repo;

class NewsController extends Controller
{
    private $repo;

    public function __construct(Repo $repo)
    {
        $this->repo = $repo;
    }

    public function index(Request  $request )
    {
        $sort = $request->get('sort', 'id');
        $sortType = $request->get('sort_type', 'asc');
        $filters = $request->get('filters', '*');
        $page = $request->get('page', 1);
        $pageEntries  = $request->get('pageEntries', 10);


        return Cache::tags('News','Api')->rememberForever('api.news.index.' . $sort . $sortType . $filters . $page . $pageEntries,
            function() use ($sort, $sortType, $filters, $page, $pageEntries) {

            if($filters == "*")
                $filters = ["*"];
            else
                $filters = explode(',', $filters);

            try{
                $records = $this->repo
                    ->where('status', 1)
                    ->where('is_active', 1)
                    ->orderBy($sort, $sortType)
                    ->paginate($pageEntries,$filters,'page',$page);

                return  fractal()
                    ->collection($records)
                    ->transformWith(new NewsTransformer)
                    ->toArray();

            }catch (ModelNotFoundException $e){

                return response()->setStatusCode(404);
            }
        });
    }

    public function show(Request $request, $id)
    {
        $with  = $request->get('with', '');

        return Cache::tags('News','Api')->rememberForever('api.news.show' . $id . $with, function() use ($id, $with) {

            if($with != '')
                $with = explode(',', $with);


            try{
                $record = $this->repo
                    ->with($with)
                    ->where('status', 1)
                    ->where('is_active', 1)
                    ->findBy('id',$id);

                return  fractal()
                    ->item($record)
                    ->parseIncludes($with)
                    ->transformWith(new NewsTransformer())
                    ->toArray();

            }catch (ModelNotFoundException $e){

                return response()->setStatusCode(404);
            }
        });
    }
}
