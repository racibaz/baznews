<?php

namespace App\Modules\News\Http\Controllers\Api\NewsSource;

use App\Http\Controllers\ApiController;
use App\Modules\News\Models\NewsSource;

class NewsSourceNewsController extends ApiController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(NewsSource $record)
    {
        return $this->showAll($record->news);
    }
}
