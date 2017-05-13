<?php

namespace App\Modules\Book\Http\Controllers\Api\Book;

use App\Http\Controllers\ApiController;
use App\Modules\Book\Models\Book;
use App\Modules\Book\Repositories\BookRepository as Repo;

class BookController extends ApiController
{
    private $repo;

    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->repo = $repo;
    }

    public function index()
    {
        return $this->showAll($this->repo->findAll());
    }

    public function show(Book $record)
    {
        return $this->showOne($record);
    }
}
