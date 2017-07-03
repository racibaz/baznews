<?php

namespace App\Modules\News\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Modules\News\Repositories\VideoRepository as Repo;
use App\Modules\News\Repositories\VideoCategoryRepository as VideoCategoryRepo;
use App\Modules\News\Repositories\VideoGalleryRepository as VideoGalleryRepo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Support\Facades\Cache;

class VideoController extends Controller
{
    private $repo, $videoGallery, $videoCategoryRepo;

    public function __construct(Repo $repo, VideoGalleryRepo $videoGallery, VideoCategoryRepo $videoCategoryRepo)
    {
        $this->repo = $repo;
        $this->videoGallery = $videoGallery;
        $this->videoCategoryRepo = $videoCategoryRepo;
    }

    public function getVideoBySlug($slug)
    {
        $id =  substr(strrchr($slug, '-'), 1 );

        return Cache::tags(['VideoController', 'News', 'video'])->rememberForever('video:'.$id, function() use($id) {

            $video = $this->repo->getVideo($id);
            abort_if(empty($video), 404, trans('common.not_found'));
            $videoGallery = $video->video_gallery;
            $tags = $video->tags;

            $nextVideo = $this->repo->getNextVideo($video);
            $previousVideo = $this->repo->getPreviousVideo($video);
            $otherGalleryVideos = $this->repo->getOtherGalleryVideos($video);

            $otherGalleries = $this->videoGallery->getOtherGalleries($videoGallery);
            $lastestVideos = $this->repo->getLatestVideos(20);
            $categoryVideos = $this->videoCategoryRepo->getVideoCategoryVideos($video);


            //todo is set video's videocategory area for video category relations
            if(!empty($videoGallery->video_category)) {
                $videoGallery->video_category;
            }

            return Theme::view('news::frontend.video.video', compact([
                'video',
                'videoGallery',
                'tags',
                'previousVideo',
                'nextVideo',
                'otherGalleryVideos',
                'lastestVideos',
                'categoryVideos',
            ]))->render();
        });

    }
}
