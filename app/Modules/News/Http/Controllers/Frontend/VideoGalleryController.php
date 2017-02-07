<?php

namespace App\Modules\News\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Modules\News\Repositories\VideoCategoryRepository;
use App\Modules\News\Repositories\VideoGalleryRepository as Repo;
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
        $id =  substr(strrchr($slug, '-'), 1 );

        return Cache::remember('video_gallery:'.$id, 100, function() use($id) {

            $videoGallery = $this->repo
                ->with(['video_category', 'videos'])
                ->where('is_active', 1)
                ->findBy('id',$id);

            $otherGalleries = $videoGallery->video_category->video_galleries->where('is_active',1)->where('id', '<>', $videoGallery->id)->take(10);

            $galleryVideos = $videoGallery->videos;
            $firstVideo = $videoGallery->videos->first();
            $lastVideoGalleries = $this->repo->orderBy('updated_at','desc')->findAll()->take(6);

            $videoCategoryRepo = new VideoCategoryRepository();
            $videoCategories = $videoCategoryRepo->where('is_cuff',1)->where('is_active',1)->findAll();

            //todo will be must Popular Videos area
            //todo how to increment hit area?(redis cache)

            return Theme::view('news::frontend.video_gallery.video_gallery', compact([
                'videoGallery',
                'otherGalleries',
                'firstVideo',
                'lastVideoGalleries',
                'randomVideos',
                'videoCategories',
            ]))->render();
        });

    }
}
