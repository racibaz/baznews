<?php

namespace App\Modules\Article\Repositories;

use Rinvex\Repository\Repositories\EloquentRepository;

class ArticleRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

    protected $model = 'App\Modules\Article\Models\Article';

}