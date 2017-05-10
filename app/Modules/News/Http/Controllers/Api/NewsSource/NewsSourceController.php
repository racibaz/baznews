<?php

namespace App\Modules\News\Http\Controllers\Api\NewsSource;

use App\Http\Controllers\ApiController;
use App\Modules\News\Models\NewsSource;
use App\Modules\News\Repositories\NewsSourceRepository as Repo;

class NewsSourceController extends ApiController
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

    public function show(NewsSource $record)
    {
        return $this->showOne($record);
    }
}
