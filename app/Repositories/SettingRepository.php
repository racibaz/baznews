<?php namespace App\Repositories;


use Rinvex\Repository\Repositories\EloquentRepository;

class SettingRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

    protected $model = 'App\Models\Setting';

}