<?php

namespace App\Modules\Article\Http\Controllers\Api\Article;

use App\Http\Controllers\ApiController;
use App\Modules\Article\Models\Article;

class ArticleArticleCategoryController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Article $record)
    {
        return $this->showAll($record->article_categories);
    }
}
