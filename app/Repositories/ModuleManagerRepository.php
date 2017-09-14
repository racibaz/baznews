<?php

namespace App\Repositories;

use App\Models\WidgetManager;
use Rinvex\Repository\Repositories\EloquentRepository;

class ModuleManagerRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

    protected $model = 'App\Models\ModuleManager';


    public function getModelWidgets($modelSlug)
    {
        $modelName = $this->getModelName($modelSlug);
        return  WidgetManager::where('module_name', $modelName)->get();
    }

    public function setPassiveModeOfModelWidgets($modelSlug)
    {
        $modelName = $this->getModelName($modelSlug);
        WidgetManager::where('module_name', $modelName)
            ->update(['is_active' => 0]);

        return true;
    }

    public function getModelName($modelSlug)
    {
        return title_case($modelSlug);
    }
}