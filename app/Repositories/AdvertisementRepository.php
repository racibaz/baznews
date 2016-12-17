<?php

namespace App\Repositories;

use Rinvex\Repository\Repositories\EloquentRepository;

class AdvertisementRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

    protected $model = 'App\Models\Advertisement';

}