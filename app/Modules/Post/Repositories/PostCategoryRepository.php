<?php

namespace App\Modules\Post\Repositories;

use Rinvex\Repository\Repositories\EloquentRepository;

class PostCategoryRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

    protected $model = 'App\Modules\Post\Models\PostCategory';

}