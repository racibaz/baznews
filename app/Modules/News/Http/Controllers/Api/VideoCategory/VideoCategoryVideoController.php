<?php

namespace App\Modules\News\Http\Controllers\Api\VideoCategory;

use App\Http\Controllers\ApiController;
use App\Modules\News\Models\VideoCategory;


class VideoCategoryVideoController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(VideoCategory $record)
    {
        return $this->showAll($record->videos);
    }
}
