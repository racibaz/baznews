<?php

namespace App\Modules\Post\Repositories;

use Rinvex\Repository\Repositories\EloquentRepository;

class PostRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

    protected $model = 'App\Modules\Post\Models\Post';

}