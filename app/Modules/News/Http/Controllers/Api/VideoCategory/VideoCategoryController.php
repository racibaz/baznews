<?php

namespace App\Modules\News\Http\Controllers\Api\VideoCategory;

use App\Http\Controllers\ApiController;
use App\Modules\News\Models\VideoCategory;
use App\Modules\News\Repositories\NewsRepository as Repo;

class VideoCategoryController extends ApiController
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

    public function show(VideoCategory $record)
    {
        return $this->showOne($record);
    }
}
