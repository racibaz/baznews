<?php

namespace App\Modules\News\Http\Controllers\Api\VideoGallery;

use App\Http\Controllers\ApiController;
use App\Modules\News\Models\VideoGallery;

class VideoGalleryVideoController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(VideoGallery $record)
    {
        return $this->showAll($record->videos);
    }
}
