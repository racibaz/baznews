<?php

namespace App\Modules\Book\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\Book\Repositories\BookAuthorRepository as Repo;
use Cache;

class BookAuthorController extends Controller
{
    public function __construct(Repo $repo)
    {
        $this->repo = $repo;
    }

    public function show($slug)
    {
        $id = substr(strrchr($slug, '-'), 1);
        return Cache::tags(['BookAuthorController', 'Book', 'bookAuthor'])->rememberForever(request()->fullUrl(), function () use ($id) {

            try
            {
                $bookAuthor = $this->repo
                    ->with(['books'])
                    ->where('is_active', 1)
                    ->findBy('id', $id);


                if(empty($bookAuthor)){
                    abort(404);
                }

                $records = $bookAuthor->books()->paginate();

                return view('book::frontend.book_author.show', compact([
                    'bookAuthor',
                    'records',
                ]))->render();

            }catch(\Exception $e){
                abort(404);
            }
        });
    }
}
