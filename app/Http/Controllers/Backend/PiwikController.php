<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use RobBrazier\Piwik\Facades\Piwik;

class PiwikController extends Controller
{
    public function index()
    {
        dd(Piwik::actions('json'));


    }
}
