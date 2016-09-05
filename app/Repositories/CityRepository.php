<?php namespace App\Repositories;


/**
 * Created by PhpStorm.
 * User: recai.cansiz
 * Date: 30.8.2016
 * Time: 12:53
 */


use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;

class CityRepository extends Repository {

    public function model() {
        return 'App\Models\City';
    }

}