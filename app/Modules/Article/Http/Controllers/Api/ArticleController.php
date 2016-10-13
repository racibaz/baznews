<?php

namespace App\Modules\Article\Http\Controllers\Api;

use App\Modules\Article\Models\Article;
use App\Modules\Article\Models\ArticleCategory;
use App\Modules\Article\Transformers\ArticleCategoryTransformer;
use App\Modules\Article\Transformers\ArticleTransformer;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;


class ArticleController extends Controller
{
    use Helpers;


    public function getArticles()
    {
        $records = Article::all();
        
        return $this->response->collection($records, new ArticleTransformer() )->setStatusCode(200);
    }


    public function getArticleCategories()
    {
        $records = ArticleCategory::all();

        return $this->response->collection($records, new ArticleCategoryTransformer() )->setStatusCode(200);
    }
}
