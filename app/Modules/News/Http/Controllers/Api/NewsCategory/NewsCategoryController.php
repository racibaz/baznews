<?php

namespace App\Modules\News\Http\Controllers\Api\NewsCategory;

use App\Http\Controllers\ApiController;
use App\Modules\News\Models\NewsCategory;
use App\Modules\News\Repositories\NewsCategoryRepository as Repo;

class NewsCategoryController extends ApiController
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

    public function show(NewsCategory $record)
    {
        return $this->showOne($record);
    }
}
