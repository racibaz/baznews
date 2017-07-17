<?php namespace App\Repositories;


use Rinvex\Repository\Repositories\EloquentRepository;

class UserRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

    protected $model = 'App\Models\User';

    public function getUserBySlug($slug)
    {
        $user = $this->where('slug', $slug)
            ->where('is_active', 1)
            ->where('status', 1)
            ->first();

        return $user ? $user : null;
    }
}