<?php

namespace App\Repositories;

use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;

use Rinvex\Repository\Repositories\EloquentRepository;

class LanguageRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

    protected $model = 'App\Models\Language';

}