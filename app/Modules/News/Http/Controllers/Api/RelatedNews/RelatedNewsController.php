<?php

namespace App\Modules\News\Http\Controllers\Api\RelatedNews;

use App\Http\Controllers\ApiController;
use App\Modules\News\Models\RelatedNews;

class RelatedNewsController extends ApiController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return $this->showAll(RelatedNews::all());
    }

    public function show(RelatedNews $record)
    {
        return $this->showOne($record);
    }
}
