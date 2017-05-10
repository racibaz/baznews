<?php

namespace App\Modules\News\Http\Controllers\Api\News;

use App\Http\Controllers\ApiController;
use App\Modules\News\Models\News;
use App\Modules\News\Repositories\NewsRepository as Repo;

class NewsController extends ApiController
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

    public function show(News $record)
    {
        return $this->showOne($record);
    }
}
