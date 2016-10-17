<?php

namespace App\Modules\Article\Http\Controllers\Api;

use App\Modules\Article\Models\Article;
use App\Modules\Article\Models\ArticleCategory;
use App\Modules\Article\Transformers\ArticleCategoryTransformer;
use App\Modules\Article\Transformers\ArticleTransformer;
use Carbon\Carbon;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Modules\Article\Repositories\ArticleRepository as Repo;


class ArticleController extends Controller
{
    use Helpers;




    public function index()
    {
        $expiresAt = Carbon::now()->addMinutes(10);

        $records = Cache::remember('users', $expiresAt, function() {

            return   $this->repo->orderBy('updated_at', 'desc')->findAll();

        });

        return $this->response->collection($records, new ArticleTransformer() )->setStatusCode(200);

    }


    public function getArticles($count = null)
    {
        //DB::connection()->enableQueryLog();

        $expiresAt = Carbon::now()->addMinutes(10);

//        $records = Cache::remember('art', $expiresAt, function($count) {
//
//            if($count != null) {
//
//                return  Article::where('is_active',1)->take($count)->orderBy('updated_at', 'desc')->get();
//
//            }else {
//
//                return  Article::where('is_active',1)->orderBy('updated_at', 'desc')->get();
//            }
//
//        });







        if(Cache::has('articles'))
        {

            $records = Cache::get('articles');
        }else
        {
            if($count != null) {

                $records =   Article::where('is_active',1)->orderBy('updated_at', 'desc')->take($count)->get();

            }else {
                $records =  Article::where('is_active',1)->orderBy('updated_at', 'desc')->get();
            }
            Cache::store('redis')->put('articles', $records, 10);
        }

        //$queries  = DB::getQueryLog();
        //print_r($queries);
        return $this->response->collection($records, new ArticleTransformer() )->setStatusCode(200);
    }



    public function show($id)
    {
        $records = $this->repo->orderBy('updated_at', 'desc')->findAll();

        return $this->response->collection($records, new ArticleTransformer() )->setStatusCode(200);
    }

    public function getArticleById($id)
    {
        $record = $this->repo->find($id);

        return $this->response->item($record, new ArticleTransformer() )->setStatusCode(200);
    }

    public function getArticleCategories()
    {
        $records = ArticleCategory::all();

        return $this->response->collection($records, new ArticleCategoryTransformer() )->setStatusCode(200);
    }
}
