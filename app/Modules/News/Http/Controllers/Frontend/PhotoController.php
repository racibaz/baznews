<?php

namespace App\Modules\News\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\News\Repositories\PhotoCategoryRepository;
use App\Modules\News\Repositories\PhotoRepository as Repo;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
        $id = substr(strrchr($slug, '-'), 1);

        return Cache::tags(['PhotoController', 'News', 'photo'])->rememberForever('photo:' . $id, function () use ($id) {

            try{
                $photo = $this->repo->with(['tags'])->where('is_active', 1)->find($id);
                
                $previousPhoto = $this->repo
                    ->where('is_active', 1)
                    ->where('id', '<', $photo->id)
                    ->findAll()
                    ->last();

                if (empty($previousPhoto))
                    $previousPhoto = $this->repo->where('is_active', 1)->findAll()->last();


                $nextPhoto = $this->repo
                    ->where('is_active', 1)
                    ->where('id', '>', $photo->id)
                    ->findAll()
                    ->first();

                if (empty($nextPhoto))
                    $nextPhoto = $this->repo->where('is_active', 1)->findAll()->first();


                $photoCategories = app(PhotoCategoryRepository::class)->where('is_cuff', 1)->where('is_active', 1)->findAll();

                $lastPhotos = $this->repo->where('is_active', 1)->orderBy('updated_at', 'desc')->findAll()->take(10);

            }catch (\Exception $e){
                abort(404);
            }


            return view('news::frontend.photo.photo', compact([
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
