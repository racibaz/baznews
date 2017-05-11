<?php

namespace App\Modules\News\Http\Controllers\Api\PhotoCategory;

use App\Http\Controllers\ApiController;
use App\Modules\News\Models\PhotoCategory;
use App\Modules\News\Repositories\PhotoCategoryRepository as Repo;

class PhotoCategoryController extends ApiController
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

    public function show(PhotoCategory $record)
    {
        return $this->showOne($record);
    }
}
