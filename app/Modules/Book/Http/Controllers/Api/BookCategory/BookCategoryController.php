<?php

namespace App\Modules\Book\Http\Controllers\Api\BookCategory;

use App\Http\Controllers\ApiController;
use App\Modules\Book\Models\BookCategory;
use App\Modules\Book\Repositories\BookCategoryRepository as Repo;

class BookCategoryController extends ApiController
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

    public function show(BookCategory $record)
    {
        return $this->showOne($record);
    }
}
