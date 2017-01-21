<?php

namespace App\Modules\News\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\News\Repositories\PhotoCategoryRepository;
use App\Modules\News\Repositories\PhotoGalleryRepository as Repo;
use App\Modules\News\Repositories\PhotoRepository;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Support\Facades\Cache;

class PhotoGalleryController extends Controller
{
    private $repo;

    public function __construct(Repo $repo)
    {
        $this->repo = $repo;
    }

    public function getPhotoGalleryBySlug($slug)
    {
        $id =  substr(strrchr($slug, '-'), 1 );

        return Cache::remember('photo_gallery:'.$id, 100, function() use($id) {

            //$slug = htmlentities(strip_tags($id), ENT_QUOTES, 'UTF-8');
            $photoGallery = $this->repo
                ->where('is_active', 1)
                ->find($id);


            $galleryPhotos = $photoGallery->photos;
            $firstPhoto = $photoGallery->photos
                ->first();

            $lastPhoto = $photoGallery->photos
                ->take(-1)
                ->first();


//            $nextPhoto = $photoGallery->photos
//                    ->splice(1, 1)
//                    ->first();


//            $nextPhoto = $photoGallery->photos
//                ->forPage(2, 1)
//                ->first();



            $nextPhoto = $photoGallery->photos->filter(function($photo) use($firstPhoto){

                return $photo->id > $firstPhoto->id;
            })->first();

            $nextPhoto = !isset($nextPhoto) ? $firstPhoto : $nextPhoto;



            $photoRepository = new PhotoRepository();
            //$lastphotos = $photoRepository->orderBy('updated_at','desc')->limit(6)->findAll();

            $photoCount = $photoRepository->where('is_active',1)->findAll()->count();
            $randomPhotos = $photoRepository->where('is_active',1)->findAll()->random(3);


            $photoCategoryGalleries = $this->getPhotoGalleriesFormPhotoCategory($photoGallery->photo_category->id);
            //mevcutta gösterilen foto galeriyi collection dan siliyoruz.
            $photoCategoryGalleries = $photoCategoryGalleries->except($photoGallery->id);




            //todo will be must Popular photos area
            //todo how to increment hit area?(redis cache)

            return Theme::view('news::frontend.photo_gallery.photo_gallery', compact([
                'photoGallery',
                'galleryPhotos',
                'firstPhoto',
                //'lastphotos',
                'randomPhotos',
                'photoCategoryGalleries',
                'nextPhoto',
                'lastPhoto',
            ]))->render();
        });
    }


    public function showGalleryPhotos($slug)
    {
        $id =  substr(strrchr($slug, '-'), 1 );

        return Cache::remember('showGalleryPhotos:'.$id, 100, function() use($id) {


            $photoRepository = new PhotoRepository();
            $photo = $photoRepository->where('is_active',1)->find($id);

            $photoGallery = $photo->photo_gallery;
            $galleryPhotos = $photoGallery->photos;

            $firstPhoto = $photoGallery->photos->first();

            $lastPhoto = $photoGallery->photos
                ->take(-1)
                ->first();

            $nextPhoto = $photoGallery->photos->filter(function($galleryPhoto) use($photo){

                return $galleryPhoto->id > $photo->id;
            })->first();

            $nextPhoto = !isset($nextPhoto) ? $firstPhoto : $nextPhoto;


            $previousPhoto = $photoGallery->photos->filter(function($galleryPhoto) use($photo){

                return $galleryPhoto->id < $photo->id;
            })->first();

            $previousPhoto = !isset($previousPhoto) ? $firstPhoto : $previousPhoto;


            $photoCount = $photoRepository->where('is_active',1)->findAll()->count();
            $randomPhotos = $photoRepository->where('is_active',1)->findAll()->random(3);

            $photoCategoryRepository = new PhotoCategoryRepository();
            $photoCategories = $photoCategoryRepository->where('is_cuff',1)->where('is_active',1)->findAll();

            //todo will be must Popular photos area
            //todo how to increment hit area?(redis cache)

            $photoCategoryGalleries = $this->getPhotoGalleriesFormPhotoCategory($photoGallery->photo_category->id);
            //mevcutta gösterilen foto galeriyi collection dan siliyoruz.
            $photoCategoryGalleries = $photoCategoryGalleries->except($photoGallery->id);

            return Theme::view('news::frontend.photo_gallery.photo_gallery_photos', compact([
                'photoGallery',
                'galleryPhotos',
                'firstPhoto',
                //'lastphotos',
                'randomPhotos',
                'photoCategories',
                'photoCategoryGalleries',
                'lastPhoto',
                'nextPhoto',
                'previousPhoto',
                'photo',
            ]))->render();
        });
    }

    public function getPhotoGalleriesFormPhotoCategory($id)
    {
        return Cache::remember('PhotoGalleriesFormPhotoCategory:'.$id, 100, function() use($id) {

            $photoCategoryRepository = new PhotoCategoryRepository();
            $photoCategory = $photoCategoryRepository
                ->where('is_cuff',1)
                ->where('is_active',1)
                ->find($id);

            return $photoCategory->photo_galleries;
        });
    }

}
