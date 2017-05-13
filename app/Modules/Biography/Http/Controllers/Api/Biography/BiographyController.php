<?php

namespace App\Modules\Biography\Http\Controllers\Api\Biography;

use App\Http\Controllers\ApiController;
use App\Modules\Biography\Models\Biography;
use App\Modules\Biography\Repositories\BiographyRepository as Repo;

class BiographyController extends ApiController
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

    public function show(Biography $record)
    {
        return $this->showOne($record);
    }
}
