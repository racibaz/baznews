<?php

namespace App\Modules\News\Repositories;

use Exception;
use Log;
use Rinvex\Repository\Repositories\EloquentRepository;
use Illuminate\Support\Facades\File;

class VideoRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

    protected $model = 'App\Modules\News\Models\Video';


    public function getOtherGalleryVideos($video)
    {
         $videoGalleryVideos = $this->where('is_active', 1)
            ->where('video_gallery_id',$video->video_gallery_id)
            ->whereNotIn('id', [$video->id])
            ->findAll()
            ->take(10);

         return isset($videoGalleryVideos) ? $videoGalleryVideos : null;
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
        return  $this->where('is_active',1)->orderBy('updated_at', 'desc')->findAll()->take($take);
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

    public function deleteVideoFiles($video) : bool
    {
        try{

            $videoTitle = $video->title;
            $videoId = $video->id;

            if(File::isDirectory(public_path('videos/' . $video->id))){
                File::deleteDirectory(public_path('videos/' . $video->id));
                return true;
            }else{
                return false;
            }

        }catch (Exception $e)
        {
            Log::warning('Video {$videoId} : ($videoTitle)' . trans('log.video_deleting_error'));
        }
    }


    public function getLastVideoItems($take = 20)
    {
        return $this->where('is_active', 1)
            ->orderBy('created_at', 'desc')
            ->findAll()
            ->take($take);
    }

}