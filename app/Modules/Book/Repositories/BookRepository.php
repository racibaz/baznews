<?php

namespace App\Modules\Book\Repositories;

use Rinvex\Repository\Repositories\EloquentRepository;

class BookRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

    protected $model = 'App\Modules\Book\Models\Book';

}