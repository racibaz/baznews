<?php

namespace App\Modules\Book\Http\Controllers\Api\BookAuthor;

use App\Http\Controllers\ApiController;
use App\Modules\Book\Models\BookAuthor;
use App\Modules\Book\Repositories\BookAuthorRepository as Repo;

class BookAuthorController extends ApiController
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

    public function show(BookAuthor $record)
    {
        return $this->showOne($record);
    }
}
