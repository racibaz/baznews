<?php

namespace App\Modules\Article\Http\Controllers\Api\ArticleAuthor;

use App\Http\Controllers\ApiController;
use App\Modules\Article\Models\ArticleAuthor;

class ArticleAuthorArticleController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(ArticleAuthor $record)
    {
        return $this->showAll($record->articles);
    }
}
