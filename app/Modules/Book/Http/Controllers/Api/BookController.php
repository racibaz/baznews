<?php

namespace App\Modules\Book\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Book\Models\Book;
use App\Modules\Book\Transformers\BookTransformer;
use Dingo\Api\Routing\Helpers;
use Illuminate\Support\Facades\Cache;

class BookController extends Controller
{
    use Helpers;

    public function getBooks($count = null)
    {
        $records =  Cache::remember('getBooks', 10, function() use ($count) {

            if($count != null) {

                $records = Book::where('is_active', 1)->take($count)->get();

            }else {

                $records = Book::where('is_active', 1)->get();
            }

            return $records;
        });

        return $this->response->collection($records, new BookTransformer() )->setStatusCode(200);
    }

    public function getBookById($id)
    {
        $record =  Cache::remember('getBookById-'.$id, 10, function() use ($id) {

            return  Book::where('id', $id)->where('is_active', 1)->first();
        });

        return $this->response->item($record, new BookTransformer() )->setStatusCode(200);
    }

}
