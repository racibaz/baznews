<?php

namespace App\Modules\News\Http\Controllers\Api\Photo;

use App\Http\Controllers\ApiController;
use App\Modules\News\Models\Photo;
use App\Modules\News\Repositories\PhotoRepository as Repo;

class PhotoController extends ApiController
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

    public function show(Photo $record)
    {
        return $this->showOne($record);
    }
}
