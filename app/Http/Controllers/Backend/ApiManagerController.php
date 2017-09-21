<?php

namespace App\Http\Controllers\Backend;

class ApiManagerController extends BackendController
{

    public function __construct()
    {
        parent::__construct();

        $this->view = 'api_manager.';
        $this->redirectViewName = 'backend.';
    }

    public function index()
    {
        $records = [];
        return view($this->getViewName(__FUNCTION__), compact('records'));
    }
}
