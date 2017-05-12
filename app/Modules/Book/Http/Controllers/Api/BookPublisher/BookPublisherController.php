<?php

namespace App\Modules\Book\Http\Controllers\Api\BookPublisher;

use App\Http\Controllers\ApiController;
use App\Modules\Book\Models\BookPublisher;
use App\Modules\Book\Repositories\BookPublisherRepository as Repo;

class BookPublisherController extends ApiController
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

    public function show(BookPublisher $record)
    {
        return $this->showOne($record);
    }
}
