<?php

namespace App\Modules\News\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Modules\News\Repositories\VideoCategoryRepository;
use App\Modules\News\Repositories\VideoRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Support\Facades\Cache;

class VideoGalleryController extends Controller
{
    private $repo;

    public function __construct(Repo $repo)
    {
        $this->repo = $repo;
    }

    public function getVideoGalleryBySlug($slug)
    {
        $id = substr(strrchr($slug, '-'), 1);

        return Cache::tags(['VideoGalleryController', 'News', 'video_gallery'])->rememberForever('video_gallery:'.$id, function() use($id) {

            $video = $this->repo->getVideo($id);
            abort_if(empty($video), 404, trans('common.not_found'));

            $galleryVideos = $video->video_gallery->videos;
            $videoGallery = $video->video_gallery;
            $tags = $video->tags;

            $videoCategoryRepo = new VideoCategoryRepository();
            $videoCategories = $videoCategoryRepo->getCuffVideoCategories();

            $nextVideo = $this->repo->getNextVideo($videoGallery,$video);
            $previousVideo = $this->repo->getPreviousVideo($videoGallery,$video);
            $otherGalleryVideos = $this->repo->getOtherGalleryVideos($video);
            $otherGalleries = $videoGallery->video_category->video_galleries->where('is_active', 1)->where('id', '<>', $videoGallery->id)->take(10);
            $lastestVideos = $this->repo->getLatestVideos(20);
            $categoryVideos = $this->repo->getVideoCategoryVideos($video);

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
