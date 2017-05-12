<?php

namespace App\Modules\Book\Http\Controllers\Api\BookAuthor;

use App\Http\Controllers\ApiController;
use App\Modules\Book\Models\BookAuthor;

class BookAuthorBookController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(BookAuthor $record)
    {
        return $this->showAll($record->books);
    }
}
