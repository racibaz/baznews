<?php

namespace App\Modules\News\Repositories;

use Rinvex\Repository\Repositories\EloquentRepository;

class VideoCategoryRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

    protected $model = 'App\Modules\News\Models\VideoCategory';

    public function getCuffVideoCategories()
    {
        return $this->where('is_cuff', 1)->where('is_active', 1)->findAll();
    }

    public function getVideoCategoryVideos($video, $take = 10)
    {
        if (!empty($video->video_category)) {
            return $video->video_category->videos->where('is_active', 1)->take($take);
        }

        return null;
    }
}