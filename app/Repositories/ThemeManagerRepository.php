<?php

namespace App\Repositories;

use Rinvex\Repository\Repositories\EloquentRepository;

class ThemeManagerRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

    protected $model = 'App\Models\ThemeManager';

}