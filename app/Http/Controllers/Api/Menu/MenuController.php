<?php

namespace App\Http\Controllers\Api\Menu;

use App\Http\Controllers\ApiController;
use App\Models\Menu;
use App\Repositories\MenuRepository as Repo;

class MenuController extends ApiController
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

    public function show(Menu $record)
    {
        return $this->showOne($record);
    }
}
