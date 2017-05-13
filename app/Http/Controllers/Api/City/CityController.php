<?php

namespace App\Http\Controllers\Api\City;

use App\Http\Controllers\ApiController;
use App\Models\City;
use App\Repositories\CityRepository as Repo;

class CityController extends ApiController
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

    public function show(City $record)
    {
        return $this->showOne($record);
    }
}
