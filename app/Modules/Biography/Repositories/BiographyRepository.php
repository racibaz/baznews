<?php

namespace App\Modules\Biography\Repositories;

use App\Modules\Biography\Models\Biography;
use Rinvex\Repository\Repositories\EloquentRepository;
use Illuminate\Support\Facades\Auth;

class BiographyRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

    protected $model = 'App\Modules\Biography\Models\Biography';

    public function getUserStatuses()
    {
        $statusList = [];

        foreach (Biography::$statuses  as  $index => $status){

            if(Auth::user()->can($status . '-biography')){
                $statusList[$index] =  $status;
            }
        }

        return $statusList;
    }
}