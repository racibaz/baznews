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

        return Cache::remember('video:'.$id, 100, function() use($id) {

            $video = $this->repo
                ->with(['video_gallery','tags'])
                ->where('is_active', 1)
                ->findBy('id',$id);


            $videoGallery = $video->video_gallery;
            $tags = $video->tags;

            $firstVideo = $videoGallery->videos->first();

            $lastVideo = $videoGallery->videos
                ->take(-1)
                ->first();

            $nextVideo = $videoGallery->videos->filter(function($galleryVideo) use($video){

                return $galleryVideo->id > $video->id;
            })->first();

            $nextVideo = !isset($nextVideo) ? $firstVideo : $nextVideo;

            $previousVideo = $videoGallery->videos->filter(function($galleryVideo) use($video){

                return $galleryVideo->id < $video->id;
            })->first();

            $previousVideo = !isset($previousVideo) ? $firstVideo : $previousVideo;

            $otherGalleryVideos = $this->repo->whereNotIn('id', (array) $video->id)->findAll();

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
                'otherGalleryVideos'
            ]))->render();
        });

    }
}
