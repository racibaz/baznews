<?php

namespace App\Http\Controllers\Api\Country;

use App\Http\Controllers\ApiController;
use App\Models\Country;

class CountryCityController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Country $record)
    {
        return $this->showAll($record->cities);
    }
}
