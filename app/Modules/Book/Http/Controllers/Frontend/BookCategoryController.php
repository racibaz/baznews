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
        $this->repo = $repo;
    }

    public function show($slug)
    {
        return Cache::tags(['BookCategoryController', 'Book', 'bookCategory'])->rememberForever(request()->fullUrl(), function () use ($slug) {
            $slug = htmlentities(strip_tags($slug), ENT_QUOTES, 'UTF-8');
            $bookCategory = $this->repo
                ->with(['books'])
                ->where('is_active', 1)
                ->findBy('slug', $slug);

            $records = $bookCategory->books()->paginate();

            return Theme::view('book::frontend.book_category.show', compact([
                'bookCategory',
                'records',
            ]))->render();
        });
    }
}
