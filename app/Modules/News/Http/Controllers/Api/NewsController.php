<?php

namespace App\Modules\News\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\News\Repositories\NewsRepository as Repo;
use App\Modules\News\Transformers\NewsTransformer;
use Unlu\Laravel\Api\QueryBuilder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class NewsController extends Controller
{
    private $repo;

    public function __construct(Repo $repo)
    {
        $this->repo = $repo;
    }

    public function index(Request $request)
    {
        return Cache::tags('News', 'Api')->rememberForever('api.news.index.' . $request->fullUrl(), function () use ($request) {

            try {
                $news = $this->repo->getModel();
                $queryBuilder = new QueryBuilder(new $news, $request);
                $paginator = $this->repo->paginate(1);

                return fractal()
                    ->collection($queryBuilder->build()->paginate())
                    ->transformWith(new NewsTransformer)
                    ->parseIncludes($request->get('includes'))
//                    ->paginateWith(new IlluminatePaginatorAdapter($paginator))
//                    ->addMeta()
                    ->toArray();

            } catch (ModelNotFoundException $e) {
                return response()->setStatusCode(404);
            }
        });
    }

    public function show(Request $request, $id)
    {
        $with = $request->get('with', '');

        return Cache::tags('News', 'Api')->rememberForever('api.news.show' . $id . $with, function () use ($id, $with) {

            if ($with != '')
                $with = explode(',', $with);


            try {
                $record = $this->repo
                    ->with($with)
                    ->where('status', 1)
                    ->where('is_active', 1)
                    ->findBy('id', $id);

                return fractal()
                    ->item($record)
                    ->parseIncludes($with)
                    ->transformWith(new NewsTransformer())
                    ->toArray();

            } catch (ModelNotFoundException $e) {

                return response()->setStatusCode(404);
            }
        });
    }
}
