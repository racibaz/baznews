<?php

namespace App\Modules\News\Http\Controllers\Api\Video;

use App\Http\Controllers\ApiController;
use App\Modules\News\Models\Video;
use App\Modules\News\Repositories\VideoRepository as Repo;

class VideoController extends ApiController
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

    public function show(Video $record)
    {
        return $this->showOne($record);
    }
}
