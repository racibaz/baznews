<?php

namespace App\Modules\News\Repositories;

use Exception;
use File;
use Log;
use Rinvex\Repository\Repositories\EloquentRepository;

class VideoGalleryRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

    protected $model = 'App\Modules\News\Models\VideoGallery';


    public function getOtherGalleries($videoGallery, $take = 10)
    {
        if (empty($videoGallery)) {

            return $this->where('is_active', 1)
                ->take($take);
        }

        $videoGalleries = $videoGallery
                        ->video_category
                        ->video_galleries
                        ->where('is_active', 1)
                        ->where('id', '<>', $videoGallery->id)
                        ->take($take);

        return isset($videoGalleries) ? $videoGalleries : null;
    }

    public function getGalleryNextVideo($videoGallery, $video)
    {
        $nextVideo = $videoGallery->videos->filter(function ($galleryVideo) use ($video) {
            return $galleryVideo->id > $video->id;
        })->first();

        return !isset($nextVideo) ? $this->getGalleryFirstVideo($videoGallery) : $nextVideo;
    }


    public function getGalleryPreviousVideo($videoGallery, $video)
    {
        $previousVideo = $videoGallery->videos->filter(function ($galleryVideo) use ($video) {
            return $galleryVideo->id < $video->id;
        })->first();

        return !isset($previousVideo) ? $this->getGalleryFirstVideo($videoGallery) : $previousVideo;
    }

    public function deleteVideoGalleryFiles($videoGallery): bool
    {
        try {

            $videoGalleryTitle = $videoGallery->title;
            $videoGalleryId = $videoGallery->id;

            if (File::isDirectory(public_path('video_gallery/' . $videoGalleryId))) {
                File::deleteDirectory(public_path('video_gallery/' . $videoGalleryId));
                return true;
            } else {
                return false;
            }

        } catch (Exception $e) {
            Log::warning('VideoGallery {$videoGalleryId} : ($videoGalleryTitle)' . trans('log.video_gallery_deleting_error'));
        }
    }

    public function getGalleryFirstVideo($videoGallery)
    {
        return $videoGallery->videos->first();
    }

    public function getCuffVideoGalleries($limit = 25)
    {
        return $this->where('is_active', 1)
            ->where('is_cuff', 1)
            ->limit($limit)
            ->orderBy('updated_at', 'desc')
            ->findAll();
    }
}