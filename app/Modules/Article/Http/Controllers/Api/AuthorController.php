<?php

namespace App\Modules\Article\Http\Controllers\Api;

use App\Modules\Article\Models\Author;
use App\Modules\Article\Repositories\AuthorRepository as Repo;
use App\Modules\Article\Transformers\ArticleAuthorTransformer;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use SuperClosure\SerializableClosure;


class AuthorController extends Controller
{
    use Helpers;


    public function getAuthors($count = null)
    {

        $records =  Cache::remember('getAuthors', 10, function() use ($count) {

            if($count != null) {

                $records = Author::where('is_active',1)->take($count)->get();

            }else {

                $records = Author::where('is_active',1)->get();
            }

            return $records;
        });

        return $this->response->collection($records, new ArticleAuthorTransformer() )->setStatusCode(200);
    }
}
