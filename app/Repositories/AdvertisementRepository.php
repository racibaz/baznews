<?php

namespace App\Repositories;

use Rinvex\Repository\Repositories\EloquentRepository;

class AdvertisementRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

    protected $model = 'App\Models\Advertisement';

    public function advertisements()
    {
        return $this->where('is_active', 1)->findAll();
    }
}