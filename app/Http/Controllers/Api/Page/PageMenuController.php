<?php

namespace App\Http\Controllers\Api\Page;

use App\Http\Controllers\ApiController;
use App\Models\Page;

class PageMenuController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Page $record)
    {
        return $this->showAll($record->menus);
    }
}
