<?php

namespace App\Modules\News\Http\Controllers\Api\PhotoCategory;

use App\Http\Controllers\ApiController;
use App\Modules\News\Models\PhotoCategory;


class PhotoCategoryPhotoGalleryController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(PhotoCategory $record)
    {
        return $this->showAll($record->photo_galleries);
    }
}
