<?php

namespace App\Modules\News\Http\Controllers\Api\Photo;

use App\Http\Controllers\ApiController;
use App\Modules\News\Models\Photo;

class PhotoNewsController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Photo $record)
    {
        return $this->showAll($record->news);
    }
}
