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

        $id =  substr(strrchr($slug, '-'), 1 );

        return Cache::remember('video_gallery:'.$id, 100, function() use($id) {

            $videoGallery = $this->repo
                ->where('is_active', 1)
                ->findBy('id',$id);



            $galleryVideos = $videoGallery->videos;
            $firstVideo = $videoGallery->videos->first();

            $videoRepository = new VideoRepository();
            $lastVideos = $videoRepository->orderBy('updated_at','desc')->limit(6)->findAll();

            $videoCount = $videoRepository->where('is_active',1)->findAll()->count();
            $randomVideos = $videoRepository->where('is_active',1)->findAll()->random(3);

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
