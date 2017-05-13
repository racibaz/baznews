<?php

namespace App\Modules\News\Http\Controllers\Api\PhotoGallery;

use App\Http\Controllers\ApiController;
use App\Modules\News\Models\PhotoGallery;

class PhotoGalleryPhotoController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(PhotoGallery $record)
    {
        return $this->showAll($record->photos);
    }
}
