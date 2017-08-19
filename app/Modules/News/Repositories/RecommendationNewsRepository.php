<?php

namespace App\Modules\News\Repositories;

use Rinvex\Repository\Repositories\EloquentRepository;

class RecommendationNewsRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

    protected $model = 'App\Modules\News\Models\RecommendationNews';

    public function getCuffRecommendationNewsItems($limit = 25)
    {
        return $this->with(['news'])
            ->where('is_active', 1)
            ->where('is_cuff', 1)
            ->limit($limit)
            ->orderBy('order', 'asc')
            ->findAll();
    }
}