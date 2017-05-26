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

    public function deleteVideoGalleryFiles($videoGallery) : bool
    {
        try{

            $videoGalleryTitle = $videoGallery->title;
            $videoGalleryId = $videoGallery->id;

            if(File::isDirectory(public_path('video_gallery/' . $videoGalleryId))){
                File::deleteDirectory(public_path('video_gallery/' . $videoGalleryId));
                return true;
            }else{
                return false;
            }

        }catch (Exception $e)
        {
            Log::warning('VideoGallery {$videoGalleryId} : ($videoGalleryTitle)' . trans('log.video_gallery_deleting_error'));
        }
    }
}