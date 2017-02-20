<?php

namespace App\Modules\Book\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\Book\Models\Book;
use App\Modules\Book\Repositories\BookRepository as Repo;
use Caffeinated\Themes\Facades\Theme;

class BookController extends Controller
{

    private $repo;
    private $view = 'book.';
    private $redirectViewName = 'frontend.';
    private $redirectRouteName = '';

    public function __construct(Repo $repo)
    {
        $this->repo= $repo;
    }

    public function getViewName($methodName)
    {
        return $this->redirectViewName . $this->view . $methodName;
    }

    public function index()
    {

        $books = $this->repo->where('is_active',1)->findAll();
        return Theme::view('book::' . $this->getViewName(__FUNCTION__),compact(['books']));
    }
}
