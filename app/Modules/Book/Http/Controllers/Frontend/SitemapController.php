<?php

namespace App\Modules\Book\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\Book\Repositories\BookRepository as Repo;
use Illuminate\Support\Facades\Cache;

class SitemapController extends Controller
{
    public function __construct(Repo $repo)
    {
        $this->repo = $repo;
    }

    public function sitemap()
    {
        $books = Cache::tags(['BookController', 'Book', 'sitemap'])->rememberForever('sitemap:book', function () {
            return $this->repo->getLastBooks();
        });

        return response()
            ->view('book::frontend.sitemap.sitemap', compact('books'), 200)
            ->header('Content-Type', 'text/xml');
    }
}
