<?php

namespace App\Modules\News\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
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
            $lastVideos = $videoRepository->orderBy('updated_at','desc')->limit(5)->findAll();

            return Theme::view('news::frontend.video_gallery.video_gallery', compact([
                'videoGallery',
                'galleryVideos',
                'firstVideo',
                'lastVideos'
            ]))->render();
        });

    }
}
