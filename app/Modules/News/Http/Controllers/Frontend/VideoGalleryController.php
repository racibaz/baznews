<?php

namespace App\Modules\News\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Modules\News\Repositories\VideoCategoryRepository as VideoCategoryRepo;
use App\Modules\News\Repositories\VideoGalleryRepository as Repo;
use App\Modules\News\Repositories\VideoRepository as VideoRepo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Support\Facades\Cache;

class VideoGalleryController extends Controller
{
    private $repo, $videoRepo, $videoCategoryRepo;

    public function __construct(Repo $repo, VideoRepo $videoRepo, VideoCategoryRepo $videoCategoryRepo)
    {
        $this->repo = $repo;
        $this->videoRepo = $videoRepo;
        $this->videoCategoryRepo = $videoCategoryRepo;
    }

    public function getVideoGalleryBySlug($slug)
    {
        $id = substr(strrchr($slug, '-'), 1);

        return Cache::tags(['VideoGalleryController', 'News', 'video_gallery'])->rememberForever('video_gallery:' . $id, function () use ($id) {

            $video = $this->videoRepo->getVideo($id);
            abort_if(empty($video), 404, trans('common.not_found'));

            $galleryVideos = $video->video_gallery->videos;
            $videoGallery = $video->video_gallery;
            $tags = $video->tags;

            $nextVideo = $this->repo->getGalleryNextVideo($videoGallery, $video);
            $previousVideo = $this->repo->getGalleryPreviousVideo($videoGallery, $video);
            $otherGalleryVideos = $this->repo->getOtherGalleryVideos($video);
            $otherGalleries = $this->repo->getOtherGalleries($videoGallery);
            $lastestVideos = $this->videoRepo->getLatestVideos(20);

            $videoCategories = $this->videoCategoryRepo->getCuffVideoCategories();
            $categoryVideos = $this->videoCategoryRepo->getVideoCategoryVideos($video);
            //todo is set video's videocategory area for video category relations
            if (!empty($videoGallery->video_category)) {
                $videoGallery->video_category;
            }

            return Theme::view('news::frontend.video_gallery.video_gallery', compact([
                'video',
                'galleryVideos',
                'videoGallery',
                'tags',
                'videoCategories',
                'previousVideo',
                'nextVideo',
                'otherGalleryVideos',
                'otherGalleries',
                'lastestVideos',
                'categoryVideos',
            ]))->render();

        });
    }
}
