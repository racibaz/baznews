<?php

namespace App\Modules\Article\Http\Controllers\Api\ArticleAuthor;

use App\Http\Controllers\ApiController;
use App\Modules\Article\Models\ArticleAuthor;
use App\Modules\Article\Repositories\ArticleAuthorRepository as Repo;

class ArticleAuthorController extends ApiController
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

    public function show(ArticleAuthor $record)
    {
        return $this->showOne($record);
    }
}
