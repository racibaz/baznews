<?php

namespace App\Modules\News\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Modules\News\Repositories\VideoRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Support\Facades\Cache;

class VideoController extends Controller
{
    private $repo;

    public function __construct(Repo $repo)
    {
        $this->repo = $repo;
    }

    public function getVideoBySlug($slug)
    {
        $id =  substr(strrchr($slug, '-'), 1 );

        return Cache::tags(['VideoController', 'News', 'video'])->rememberForever('video:'.$id, function() use($id) {

            $video = $this->repo->getVideo($id);
            abort_if(empty($video), 404, trans('common.not_found'));
            $videoGallery = $video->video_gallery;
            $tags = $video->tags;

            $nextVideo = $this->repo->getNextVideo($videoGallery,$video);
            $previousVideo = $this->repo->getPreviousVideo($videoGallery,$video);
            $otherGalleryVideos = $this->repo->getOtherGalleryVideos($video->id);
            $otherGalleries = $videoGallery->video_category->video_galleries->where('is_active', 1)->where('id', '<>', $videoGallery->id)->take(10);
            $lastestVideos = $this->repo->getLatestVideos(20);
            $categoryVideos = $this->repo->getVideoCategoryVideos($video);

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
