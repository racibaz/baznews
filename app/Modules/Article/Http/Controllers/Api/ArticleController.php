<?php

namespace App\Modules\Article\Http\Controllers\Api;

use App\Modules\Article\Models\Article;
use App\Modules\Article\Models\ArticleCategory;
use App\Modules\Article\Transformers\ArticleCategoryTransformer;
use App\Modules\Article\Transformers\ArticleTransformer;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use App\Modules\Article\Repositories\ArticleRepository as Repo;
use Illuminate\Support\Facades\Input;


class ArticleController extends Controller
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

        return Cache::tags('Article','Api')->rememberForever('api.article.' . $sort . $sortType . $filters , function() use ($sort, $sortType, $filters) {

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
                    ->parseIncludes([
                        'user',
                        'article_author',
                        'article_categories'
                    ])
                    ->transformWith(new ArticleTransformer)
                    ->toArray();

            }catch (ModelNotFoundException $e){

                return response()->setStatusCode(404);
            }
        });

    }

    public function show($id)
    {
        return Cache::tags('Article','Api')->rememberForever('api.articleItem'.$id, function() use ($id) {

            try{
                $record = $this->repo
                    ->with([
                        'user',
                        'article_author',
                        'article_categories',
                    ])
                    ->where('status', 1)
                    ->where('is_active', 1)
                    ->findBy('id',$id);


                return  fractal()
                    ->item($record)
                    ->parseIncludes([
                        'user',
                        'article_author',
                        'article_categories',
                    ])
                    ->transformWith(new ArticleTransformer)
                    ->toArray();

            }catch (ModelNotFoundException $e){

                return response()->setStatusCode(404);
            }
        });
    }
}
