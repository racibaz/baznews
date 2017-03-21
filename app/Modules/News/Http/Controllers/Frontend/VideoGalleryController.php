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

            $categoryVideos = null;

            $video = $this->repo
                ->with(['video_category', 'video_gallery','tags'])
                ->where('is_active', 1)
                ->findBy('id',$id);


            $galleryVideos = $video->video_gallery->videos;


            $videoGallery = $video->video_gallery;
            $tags = $video->tags;


            $videoCategoryRepo = new VideoCategoryRepository();
            $videoCategories = $videoCategoryRepo->where('is_cuff',1)->where('is_active',1)->findAll();

            $firstVideo = $videoGallery->videos->first();


            $nextVideo = $videoGallery->videos->filter(function ($galleryVideo) use ($video) {

                return $galleryVideo->id > $video->id;
            })->first();

            $nextVideo = !isset($nextVideo) ? $firstVideo : $nextVideo;

            $previousVideo = $videoGallery->videos->filter(function ($galleryVideo) use ($video) {

                return $galleryVideo->id < $video->id;
            })->first();

            $previousVideo = !isset($previousVideo) ? $firstVideo : $previousVideo;

            $otherGalleryVideos = $this->repo->where('is_active', 1)->whereNotIn('id', [$video->id])->findAll()->take(10);

            $otherGalleries = $videoGallery->video_category->video_galleries->where('is_active', 1)->where('id', '<>', $videoGallery->id)->take(10);

            $lastestVideos = $this->repo->orderBy('updated_at', 'desc')->findAll()->take(20);

            if(!empty($video->video_category)) {
                $categoryVideos = $video->video_category->videos->where('is_active', 1)->take(10);
            }


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
