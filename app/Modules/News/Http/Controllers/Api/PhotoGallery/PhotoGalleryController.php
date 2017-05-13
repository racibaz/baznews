<?php

namespace App\Modules\News\Http\Controllers\Api\PhotoGallery;

use App\Http\Controllers\ApiController;
use App\Modules\News\Models\PhotoGallery;
use App\Modules\News\Repositories\PhotoGalleryRepository as Repo;

class PhotoGalleryController extends ApiController
{
    private $repo;

    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->repo = $repo;
    }

    public function index()
    {
        return $this->showAll($this->repo->findAll());
    }

    public function show(PhotoGallery $record)
    {
        return $this->showOne($record);
    }
}
