<?php

namespace App\Http\Controllers\Backend;

use Caffeinated\Themes\Facades\Theme;

class ApiManagerController extends BackendController
{

    public function __construct()
    {
//        parent::__construct();

        $this->view = 'api_manager.';
        $this->redirectViewName = 'backend.';
    }

    public function index()
    {
        $records = [];
        return Theme::view($this->getViewName(__FUNCTION__),compact('records'));
    }
}
