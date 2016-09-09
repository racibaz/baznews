<?php

namespace App\Repositories;

use Rinvex\Repository\Repositories\EloquentRepository;

class MenuRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

    protected $model = 'App\Models\Menu';

}