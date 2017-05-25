<?php

namespace App\Modules\News\Repositories;

use Rinvex\Repository\Repositories\EloquentRepository;

class VideoRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

    protected $model = 'App\Modules\News\Models\Video';


    public function getOtherGalleryVideos($id)
    {
        return $this->where('is_active', 1)->whereNotIn('id', [$id])->findAll()->take(10);
    }

    public function getNextVideo($videoGallery, $video)
    {
        $nextVideo = $videoGallery->videos->filter(function ($galleryVideo) use ($video) {
            return $galleryVideo->id > $video->id;
        })->first();

        return !isset($nextVideo) ? $this->getGalleryFirstVideo($videoGallery) : $nextVideo;
    }


    public function getPreviousVideo($videoGallery, $video)
    {
        $previousVideo = $videoGallery->videos->filter(function ($galleryVideo) use ($video) {
            return $galleryVideo->id < $video->id;
        })->first();

        return !isset($previousVideo) ? $this->getGalleryFirstVideo($videoGallery) : $previousVideo;
    }

    public function getLatestVideos($take = 20)
    {
        return  $this->orderBy('updated_at', 'desc')->findAll()->take($take);
    }

    public function getGalleryFirstVideo($videoGallery)
    {
        return  $videoGallery->videos->first();
    }


    public function getVideo($id)
    {
        return $this->with(['video_category', 'video_gallery','tags'])
            ->where('is_active', 1)
            ->findBy('id',$id);
    }

    public function getVideoCategoryVideos($video, $take = 10)
    {
        if(!empty($video->video_category)) {
            return  $video->video_category->videos->where('is_active', 1)->take($take);
        }

        return null;
    }

}