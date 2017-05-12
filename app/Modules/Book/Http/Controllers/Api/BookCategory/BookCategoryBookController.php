<?php

namespace App\Modules\Book\Http\Controllers\Api\BookCategory;

use App\Http\Controllers\ApiController;
use App\Modules\Book\Models\BookCategory;

class BookCategoryBookController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(BookCategory $record)
    {
        return $this->showAll($record->books);
    }
}
