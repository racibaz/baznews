<?php

namespace App\Http\Controllers\Api\Page;

use App\Http\Controllers\ApiController;
use App\Models\Page;
use App\Repositories\PageRepository as Repo;

class PageController extends ApiController
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

    public function show(Page $record)
    {
        return $this->showOne($record);
    }
}
