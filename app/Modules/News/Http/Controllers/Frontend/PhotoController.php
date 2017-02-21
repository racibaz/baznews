<?php

namespace App\Modules\News\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\News\Repositories\PhotoCategoryRepository;
use App\Modules\News\Repositories\PhotoRepository as Repo;
use App\Modules\News\Repositories\PhotoRepository;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Support\Facades\Cache;


class PhotoController extends Controller
{

    private $repo;

    public function __construct(Repo $repo)
    {
        $this->repo = $repo;
    }

    public function getPhotoBySlug($slug)
    {
        $id =  substr(strrchr($slug, '-'), 1 );

        return Cache::remember('photo:'.$id, 100, function() use($id) {

            $photo = $this->repo->with(['tags'])->where('is_active',1)->find($id);

            //todo bulunamadığında exception yerine düzgün bir hata verilecek.
            $previousPhoto = $this->repo
                ->where('is_active',1)
                ->where('id', '<' ,$photo->id)
                ->findAll()
                ->last();

            if(empty($previousPhoto))
                $previousPhoto = $this->repo->where('is_active',1)->findAll()->last();


            $nextPhoto = $this->repo
                ->where('is_active',1)
                ->where('id', '>' ,$photo->id)
                ->findAll()
                ->first();

            if(empty($nextPhoto))
                $nextPhoto =$this->repo->where('is_active',1)->findAll()->first();


            $photoCategoryRepository = new PhotoCategoryRepository();
            $photoCategories = $photoCategoryRepository->where('is_cuff',1)->where('is_active',1)->findAll();

            $lastPhotos = $this->repo->where('is_active',1)->orderBy('updated_at','desc')->findAll()->take(10);

            return Theme::view('news::frontend.photo.photo', compact([
                'photo',
                'photoGallery',
                'galleryPhotos',
                'photoCategories',
                'nextPhoto',
                'previousPhoto',
                'lastPhotos'
            ]))->render();
        });
    }
}
