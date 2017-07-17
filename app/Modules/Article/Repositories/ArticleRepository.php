<?php

namespace App\Modules\Article\Repositories;

use Rinvex\Repository\Repositories\EloquentRepository;

class ArticleRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

    protected $model = 'App\Modules\Article\Models\Article';


    public function getLastArticles($take = 1000)
    {
        return $this->where('is_active', 1)
            ->orderBy('updated_at', 'desc')
            ->findAll()
            ->take($take);
    }

}