<?php

namespace App\Modules\News\Repositories;

use Rinvex\Repository\Repositories\EloquentRepository;

class VideoGalleryRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

    protected $model = 'App\Modules\News\Models\VideoGallery';

}