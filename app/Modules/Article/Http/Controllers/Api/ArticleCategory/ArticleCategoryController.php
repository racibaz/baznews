<?php

namespace App\Modules\Article\Http\Controllers\Api\ArticleCategory;

use App\Http\Controllers\ApiController;
use App\Modules\Article\Models\ArticleCategory;
use App\Modules\Article\Repositories\ArticleCategoryRepository as Repo;

class ArticleCategoryController extends ApiController
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

    public function show(ArticleCategory $record)
    {
        return $this->showOne($record);
    }
}
