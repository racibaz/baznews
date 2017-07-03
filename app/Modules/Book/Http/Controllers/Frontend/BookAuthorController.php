<?php

namespace App\Modules\Book\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\Book\Repositories\BookAuthorRepository as Repo;
use Cache;
use Caffeinated\Themes\Facades\Theme;

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

            $bookAuthor = $this->repo
                ->with(['books'])
                ->where('is_active', 1)
                ->findBy('id', $id);

            $records = $bookAuthor->books()->paginate();

            return Theme::view('book::frontend.book_author.show', compact([
                'bookAuthor',
                'records',
            ]))->render();
        });
    }
}
