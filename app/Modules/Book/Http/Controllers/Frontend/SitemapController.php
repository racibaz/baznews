<?php

namespace App\Modules\Book\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\Book\Repositories\BookRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
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

        return Theme::response('modules.book.frontend.sitemap.sitemap', compact('books'), 200, [
            'Content-Type' => 'text/xml'
        ]);
    }
}
