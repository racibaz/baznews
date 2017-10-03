<?php

namespace App\Modules\Book\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\Book\Repositories\BookRepository as Repo;
use Cache;

class BookController extends Controller
{
    public function __construct(Repo $repo)
    {
        $this->repo = $repo;
    }

    public function show($slug)
    {
        $id = substr(strrchr($slug, '-'), 1);

        return Cache::tags(['BookController', 'Book', 'book'])->rememberForever('book:' . $id, function () use ($id) {

            try{
                $record = $this->repo
                    ->with([
                        'book_categories',
                        'book_author',
                        'user',
                    ])
                    ->where('is_active', 1)
                    ->findBy('id', $id);

                $bookFirstCategory = $record->book_categories->first();
                $firstCategoryBooks = isset($bookFirstCategory) ? $bookFirstCategory->books : [];

            }catch(\Exception $e){
                abort(404);
            }

            return view('book::frontend.book.show', compact([
                'record',
                'firstCategoryBooks'
            ]))->render();
        });
    }
}
