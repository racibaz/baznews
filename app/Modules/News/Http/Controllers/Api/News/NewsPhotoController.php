<?php

namespace App\Modules\News\Http\Controllers\Api\News;

use App\Http\Controllers\ApiController;
use App\Modules\News\Models\News;

class NewsPhotoController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(News $record)
    {
        return $this->showAll($record->photos);
    }
}
