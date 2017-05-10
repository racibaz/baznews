<?php

namespace App\Modules\News\Http\Controllers\Api\NewsCategory;

use App\Http\Controllers\ApiController;
use App\Modules\News\Models\NewsCategory;

class NewsCategoryNewsController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(NewsCategory $record)
    {
        return $this->showAll($record->news);
    }
}
