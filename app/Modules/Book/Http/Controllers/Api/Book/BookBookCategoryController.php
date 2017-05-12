<?php

namespace App\Modules\Book\Http\Controllers\Api\Book;

use App\Http\Controllers\ApiController;
use App\Modules\Book\Models\Book;

class BookBookCategoryController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Book $record)
    {
        return $this->showAll($record->book_categories);
    }
}
