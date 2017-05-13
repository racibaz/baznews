<?php

namespace App\Modules\Article\Http\Controllers\Api\Article;

use App\Http\Controllers\ApiController;
use App\Modules\Article\Models\Article;
use App\Modules\Article\Repositories\ArticleRepository as Repo;

class ArticleController extends ApiController
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

    public function show(Article $record)
    {
        return $this->showOne($record);
    }
}
