<?php

namespace App\Modules\News\Http\Controllers\Api\VideoGallery;

use App\Http\Controllers\ApiController;
use App\Modules\News\Models\VideoGallery;
use App\Modules\News\Repositories\VideoGalleryRepository as Repo;

class VideoGalleryController extends ApiController
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

    public function show(VideoGallery $record)
    {
        return $this->showOne($record);
    }
}
