<?php

namespace App\Repositories;

use Rinvex\Repository\Repositories\EloquentRepository;

class MenuRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

    protected $model = 'App\Models\Menu';

    public function getHeaderMenus()
    {
        return $this->with(['page'])
            ->where('is_header', 1)
            ->where('is_active', 1)
            ->orderBy('order','asc')
            ->findAll();
    }

    public function getFooterMenus()
    {
        return $this->with(['page'])
            ->where('is_footer', 1)
            ->where('is_active', 1)
            ->orderBy('order','asc')
            ->findAll();
    }
}