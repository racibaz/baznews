<?php

namespace App\Repositories;

use Rinvex\Repository\Repositories\EloquentRepository;
use Illuminate\Support\Facades\Cache;

class AdvertisementRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

    protected $model = 'App\Models\Advertisement';

    public function advertisements()
    {
        return $this->where('is_active', 1)->findAll();
    }

    public function putCacheAdvertisementItems()
    {
        foreach ($this->advertisements() as $advertisement) {
            Cache::tags('Setting', 'Advertisement')->forever($advertisement->name, $advertisement->code);
        }
    }
}