<?php

namespace App\Modules\News\Repositories;

use Rinvex\Repository\Repositories\EloquentRepository;

class RecommendationNewsRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

    protected $model = 'App\Modules\News\Models\RecommendationNews';

    //todo query (with) optmize edilecek.
    public function getCuffRecommendationNewsItems($limit = 25)
    {
        return $this
            ->with(['news' => function($query){

                $query->where('is_active', 1);

            }])
            ->where('is_active', 1)
            ->where('is_cuff',1)
            ->orderBy('order', 'asc')
            ->findAll()
            ->take($limit);
    }
}