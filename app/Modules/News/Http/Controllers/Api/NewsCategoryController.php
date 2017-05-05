<?php

namespace App\Modules\News\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\News\Repositories\NewsCategoryRepository as Repo;
use App\Modules\News\Transformers\NewsCategoryTransformer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;

class NewsCategoryController extends Controller
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

        return Cache::tags('NewsCategory', 'Api')->rememberForever('api.news_categories.' . $sort . $sortType . $filters, function() use ($sort, $sortType, $filters) {

            if($filters == "*")
                $filters = ["*"];
            else
                $filters = explode(',', $filters);

            try{
                $records = $this->repo
                    ->where('is_active', 1)
                    ->orderBy($sort, $sortType)
                    ->findAll($filters);

                return  fractal()
                    ->collection($records)
                    ->transformWith(new NewsCategoryTransformer)
                    ->toArray();

            }catch (ModelNotFoundException $e){

                return response()->setStatusCode(404);
            }
        });
    }

    public function show($id)
    {
        $input = Input::all();
        $sort = isset($input['sort']) ? $input['sort'] : 'id';
        $sortType = isset($input['sort_type']) ? $input['sort_type'] : 'asc';
        $filters = isset($input['filters']) ? $input['filters'] : "*";

        return Cache::tags('NewsCategory', 'Api')->rememberForever('api.news_categories'. $id . $sort . $sortType . $filters, function() use ($id, $sort, $sortType, $filters) {

            if($filters == "*")
                $filters = ["*"];
            else
                $filters = explode(',', $filters);

            try{
                $record = $this->repo
                    ->with([
                        'news'
                    ])
                    ->where('is_active', 1)
                    ->orderBy($sort, $sortType)
                    ->find($id, $filters);

                return  fractal()
                    ->item($record)
                    ->parseIncludes([
                        'news'
                    ])
                    ->transformWith(new NewsCategoryTransformer)
                    ->toArray();

            }catch (ModelNotFoundException $e){

                return response()->setStatusCode(404);
            }
        });
    }

}
