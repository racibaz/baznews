<?php

namespace App\Modules\Book\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\Book\Repositories\BookCategoryRepository as Repo;
use Cache;
use Caffeinated\Themes\Facades\Theme;

class BookCategoryController extends Controller
{
    public function __construct(Repo $repo)
    {
        $this->repo= $repo;
    }

    public function show($slug)
    {
        return Cache::remember('categoryBooks:'.$slug, 100, function() use($slug) {
            $slug = htmlentities(strip_tags($slug), ENT_QUOTES, 'UTF-8');
            $record = $this->repo
                ->with([
                    'books',
                ])
                ->where('is_active', 1)
                ->findBy('slug',$slug);

            return Theme::view('book::frontend.book_category.show', compact([
                'record',
            ]))->render();
        });
    }
}
