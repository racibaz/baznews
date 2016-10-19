<?php

namespace App\Modules\Book\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Modules\Book\Models\Book;
use Caffeinated\Themes\Facades\Theme;

class SitemapController extends Controller
{
    public function sitemap()
    {
        $books = Book::where('is_active', 1)->orderBy('updated_at', 'desc')->get();
        
        return Theme::response('modules.book.frontend.sitemap.sitemap', compact('books'), 200, [
                        'Content-Type' => 'text/xml'
            ]);
    }
}
