<?php
/**
 * Created by PhpStorm.
 * User: recai.cansiz
 * Date: 8.9.2016
 * Time: 15:21
 */

namespace App\Repositories;


use Rinvex\Repository\Repositories\EloquentRepository;

class MenuRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

    protected $model = 'App\Models\Menu';

}