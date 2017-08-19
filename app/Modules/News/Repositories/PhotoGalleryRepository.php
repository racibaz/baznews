<?php

namespace App\Modules\News\Repositories;

use Rinvex\Repository\Repositories\EloquentRepository;

class PhotoGalleryRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

    protected $model = 'App\Modules\News\Models\PhotoGallery';

    public function getCuffPhotoGalleries($limit = 25)
    {
        return $this->where('is_active', 1)
            ->where('is_cuff', 1)
            ->limit($limit)
            ->orderBy('updated_at', 'desc')
            ->findAll();
    }
}