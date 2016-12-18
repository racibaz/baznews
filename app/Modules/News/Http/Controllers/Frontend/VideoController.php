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
        return Cache::remember('video:'.$slug, 100, function() use($slug) {

            $slug = htmlentities(strip_tags($slug), ENT_QUOTES, 'UTF-8');
            $video = $this->repo
                ->with(['video_gallery','tags'])
                ->where('is_active', 1)
                ->findBy('slug',$slug);

            $videoGallery = $video->video_gallery;
            $tags = $video->tags;


            $previousVideoID =  $video::where('order', '<', $video->order)->min('id');
            $nextVideoID =  $video::where('order', '>', $video->order)->min('id');

            $previousVideo = $this->repo->with(['video_gallery'])->find($previousVideoID);
            $nextVideo = $this->repo->with(['video_gallery'])->find($nextVideoID);

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
