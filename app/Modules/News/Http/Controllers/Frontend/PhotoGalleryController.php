<?php

namespace App\Modules\News\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\News\Repositories\PhotoCategoryRepository;
use App\Modules\News\Repositories\PhotoGalleryRepository as Repo;
use App\Modules\News\Repositories\PhotoRepository;
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
        $id = substr(strrchr($slug, '-'), 1);

        return Cache::tags(['PhotoGalleryController', 'News', 'photo_gallery'])->rememberForever('photo_gallery:' . $id, function () use ($id) {

            //$slug = htmlentities(strip_tags($id), ENT_QUOTES, 'UTF-8');

            try {

                $photoGallery = $this->repo->where('is_active', 1)->find($id);

                $galleryPhotos = $photoGallery->photos;
                $firstPhoto = $photoGallery->photos->first();

                $lastPhoto = $photoGallery->photos->take(-1)->first();

                $nextPhoto = $photoGallery->photos->filter(function ($photo) use ($firstPhoto) {
                    return $photo->id > $firstPhoto->id;
                })->first();

                $nextPhoto = !isset($nextPhoto) ? $firstPhoto : $nextPhoto;

                $photoCount = app(PhotoRepository::class)->where('is_active', 1)->findAll()->count();
                $randomPhotos = app(PhotoRepository::class)->where('is_active', 1)->findAll()->random(3);


                $photoCategoryGalleries = $this->getPhotoGalleriesFormPhotoCategory($photoGallery->photo_category->id);
                //mevcutta gösterilen foto galeriyi collection dan siliyoruz.
                $photoCategoryGalleries = $photoCategoryGalleries->except($photoGallery->id);

            }catch(\Exception $e){
                abort(404);
            }

            return view('news::frontend.photo_gallery.photo_gallery', compact([
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
        $id = substr(strrchr($slug, '-'), 1);

        return Cache::tags(['PhotoGalleryController', 'News', 'showGalleryPhoto'])->rememberForever('showGalleryPhoto:' . $id, function () use ($id) {

            try {

                $photo = app(PhotoRepository::class)->where('is_active', 1)->find($id);

                $photoGallery = $photo->photo_gallery;
                $galleryPhotos = $photoGallery->photos;

                $firstPhoto = $photoGallery->photos->first();

                $lastPhoto = $photoGallery->photos->take(-1)->first();

                $nextPhoto = $photoGallery->photos->filter(function ($galleryPhoto) use ($photo) {
                    return $galleryPhoto->id > $photo->id;
                })->first();

                $nextPhoto = !isset($nextPhoto) ? $firstPhoto : $nextPhoto;


                $previousPhoto = $photoGallery->photos->filter(function ($galleryPhoto) use ($photo) {
                    return $galleryPhoto->id < $photo->id;
                })->first();

                $previousPhoto = !isset($previousPhoto) ? $firstPhoto : $previousPhoto;


                $photoCount = app(PhotoRepository::class)->where('is_active', 1)->findAll()->count();
                $randomPhotos = app(PhotoRepository::class)->where('is_active', 1)->findAll()->random(3);

                $photoCategories = app(PhotoCategoryRepository::class)->where('is_cuff', 1)->where('is_active', 1)->findAll();

                $photoCategoryGalleries = $this->getPhotoGalleriesFormPhotoCategory($photoGallery->photo_category->id);
                //mevcutta gösterilen foto galeriyi collection dan siliyoruz.
                $photoCategoryGalleries = $photoCategoryGalleries->except($photoGallery->id);

            }catch (\Exception $e){
                abort(404);
            }

            return view('news::frontend.photo_gallery.photo_gallery_photos', compact([
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
        return Cache::tags(['PhotoGalleryController', 'News', 'photoGalleriesFormPhotoCategory'])
            ->rememberForever('photoGalleriesFormPhotoCategory:' . $id, function () use ($id) {

            try{
                $photoCategory = app(PhotoCategoryRepository::class)
                    ->where('is_cuff', 1)
                    ->where('is_active', 1)
                    ->find($id);

            }catch (\Exception $e){
                abort(404);
            }

            return $photoCategory->photo_galleries;
        });
    }

}
