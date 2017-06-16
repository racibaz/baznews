<?php

namespace App\Modules\Book\Repositories;

use Rinvex\Repository\Repositories\EloquentRepository;

class BookRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

    protected $model = 'App\Modules\Book\Models\Book';


    public function getLastBooks($take = 1000)
    {
        return $this->where('is_active', 1)
            ->orderBy('updated_at', 'desc')
            ->findAll()
            ->take($take);
    }
}