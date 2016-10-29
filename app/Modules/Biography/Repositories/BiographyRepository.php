<?php

namespace App\Modules\Biography\Repositories;

use Rinvex\Repository\Repositories\EloquentRepository;

class BiographyRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

    protected $model = 'App\Modules\Biography\Models\Biography';

}