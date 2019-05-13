<?php

namespace App\Repositories;

use Rinvex\Repository\Repositories\EloquentRepository;

class EventRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

    protected $model = 'App\Models\Event';

    /**
     * @param $userId
     * @param int $take
     *
     * @return mixed
     */
    public function getUserEvents($userId, $take = 100){

        return $this->where('user_id', $userId)->orderBy('updated_at', 'desc')->get()->take($take);
    }
}