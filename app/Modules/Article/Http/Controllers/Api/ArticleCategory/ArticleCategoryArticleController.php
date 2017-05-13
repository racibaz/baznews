<?php

namespace App\Modules\Article\Http\Controllers\Api\ArticleCategory;

use App\Http\Controllers\ApiController;
use App\Modules\Article\Models\ArticleCategory;

class ArticleCategoryArticleController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(ArticleCategory $record)
    {
        return $this->showAll($record->articles);
    }
}
