<?php

namespace App\Modules\News\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Modules\News\Repositories\VideoCategoryRepository;
use App\Modules\News\Repositories\VideoGalleryRepository as Repo;
use App\Modules\News\Repositories\VideoRepository;
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
        return Cache::remember('video_gallery:'.$slug, 100, function() use($slug) {

            $slug = htmlentities(strip_tags($slug), ENT_QUOTES, 'UTF-8');
            $videoGallery = $this->repo
                ->where('is_active', 1)
                ->findBy('slug',$slug);

            $galleryVideos = $videoGallery->videos;
            $firstVideo = $videoGallery->videos->first();

            $videoRepository = new VideoRepository();
            $lastVideos = $videoRepository->orderBy('updated_at','desc')->limit(6)->findAll();

            $videoCount = $videoRepository->where('is_active',1)->findAll()->count();
            $randomVideos = $videoRepository->where('is_active',1)->findAll()->random(6);

            $videoCategoryRepository = new VideoCategoryRepository();
            $videoCategories = $videoCategoryRepository->where('is_cuff',1)->where('is_active',1)->findAll();

            //todo will be must Popular Videos area
            //todo how to increment hit area?(redis cache)

            return Theme::view('news::frontend.video_gallery.video_gallery', compact([
                'videoGallery',
                'galleryVideos',
                'firstVideo',
                'lastVideos',
                'randomVideos',
                'videoCategories',
            ]))->render();
        });

    }
}
