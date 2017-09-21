<?php

namespace App\Modules\News\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;
use App\Library\Uploader;
use App\Models\Setting;
use App\Models\Tag;
use App\Modules\News\Http\Requests\PhotoGalleryRequest;
use App\Modules\News\Models\Photo;
use App\Modules\News\Models\PhotoCategory;
use App\Modules\News\Models\PhotoGallery;
use App\Modules\News\Repositories\PhotoGalleryRepository as Repo;
use App\Modules\News\Repositories\PhotoRepository;
use League\Flysystem\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Image;

class PhotoGalleryController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'photo_gallery.';
        $this->redirectViewName = 'backend.';
        $this->repo = $repo;
    }


    public function index()
    {
        $records = $this->repo->orderBy('created_at', 'desc')->paginate();
        return view('news::' . $this->getViewName(__FUNCTION__), compact(['records']));
    }


    public function create()
    {
        $tagIDs = [];
        $photoCategories = PhotoCategory::photoCategoryList();
        $record = $this->repo->createModel();
        $tagList = Tag::tagList();

        return view('news::' . $this->getViewName(__FUNCTION__), compact([
            'record',
            'photoCategories',
            'tagList',
            'tagIDs',
        ]));
    }


    public function store(PhotoGalleryRequest $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(PhotoGallery $record)
    {
        return view('news::' . $this->getViewName(__FUNCTION__), compact('record'));
    }


    public function edit(PhotoGallery $record)
    {
        $tagIDs = [];
        $photoCategories = PhotoCategory::photoCategoryList();

        $tagList = Tag::tagList();

        foreach ($record->tags as $index => $tag) {
            $tagIDs[$index] = $tag->id;
        }

        return view('news::' . $this->getViewName(__FUNCTION__), compact([
            'record',
            'photoCategories',
            'tagList',
            'tagIDs',
        ]));
    }


    public function update(PhotoGalleryRequest $request, PhotoGallery $record)
    {
        return $this->save($record);
    }


    public function destroy(PhotoGallery $record)
    {
        $this->repo->delete($record->id);

        $this->removeCacheTags(['PhotoGalleryController']);
        $this->removeHomePageCache();

        return redirect()->route($this->redirectRouteName . $this->view . 'index');
    }


    public function save($record)
    {
        $input = Input::all();

        $input['is_cuff'] = Input::get('is_cuff') == "on" ? true : false;
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;
        $input['user_id'] = Auth::user()->id;

        /*
         * galeriye ait itemları kontrol ediyoruz.
         * galeriye içirisinde item yok ise hata aldığımızdan dolayı
         * pasif duruma alıyoruz.
         * */
        if($record->photos->count() == 0){
            $input['is_active'] = false;
            Session::flash('flash_message', trans('news::photo_gallery.not_exist_photos'));
        }else{
            if(empty($record->thumbnail) && empty($input['thumbnail'])){
                return Redirect::back()
                    ->withErrors(trans('news::photo_gallery.thumbnail_is_not_exist'))
                    ->withInput($input);
            }
        }


        if (isset($record->id)) {
            $result = $this->repo->update($record->id, $input);
        } else {
            $result = $this->repo->create($input);
        }

        if ($result) {

            //todo form tarafında foto yüklemesini kaldırdım
            //çünkü galeri resimlerini gösterirken "gallery/gallery_slug/thumbnail" olduğu için
            //tekrar kontrol etmemiz gerekiyor.Bundan foto eklemeyi kaldırdım.
            if (!empty($input['thumbnail'])) {

                $destination = '/gallery/' . $result->id . '/photos';
                //todo gallerinin photoları silinmemesi lazım
                //Uploader::removeFile($destination);

                $document_name = $input['thumbnail']->getClientOriginalName();
                Uploader::fileUpload($result, 'thumbnail', $input['thumbnail'], $destination, $document_name);


                Image::make(public_path('gallery/' . $result->id . '/photos/' . $result->thumbnail))
                    ->resize(58, 58)
                    ->save(public_path('gallery/' . $result->id . '/photos/58x58_' . $document_name));

                Image::make(public_path('gallery/' . $result->id . '/photos/' . $result->thumbnail))
                    ->resize(497, 358)
                    ->save(public_path('gallery/' . $result->id . '/photos/497x358_' . $document_name));
            }


            $this->tagsPhotoGalleryStore($result, $input);


            /*
             * slug değişmiş ise ve link kısaltmaya izin verilmişse
             * google link kısaltma servisi ile 'short_link' alanına ekliyoruz.
             *
             * */
            if (($record->slug != $result->slug) && Setting::isUrlShortener()) {

//                    $linkShortener = new LinkShortener(new Link);
//                    $result->short_url = $linkShortener->linkShortener($result->slug);
//                    $result->save();
            }


            /*
             * Delete home page cache and related caches
             * */
            $this->removeCacheTags(['PhotoGalleryController']);
            $this->removeHomePageCache();


            Session::flash('flash_message', trans('common.message_model_updated'));
            return Redirect::route($this->redirectRouteName . $this->view . 'index', $result);
        } else {
            return Redirect::back()
                ->withErrors(trans('common.save_failed'))
                ->withInput($input);
        }
    }


    public function addMultiPhotosView($photo_gallery_id)
    {
        $photo_gallery = PhotoGallery::find($photo_gallery_id);

        return view('news::' . $this->redirectViewName . $this->view . 'add_multi_photos_view', compact(['photo_gallery']));
    }


    //TODO YOUTUBE CLONE EĞİTİMİNDE Kİ GİBİ YAPILACAK JOB,QUEUE VS..
    public function addMultiPhotos(Request $request)
    {
        $gallery = PhotoGallery::find($request->input('photo_gallery_id'));
        $file = $request->file('file');
        $fileName = uniqid() . $file->getClientOriginalName();

        /*dosya isminden extension kısmını çıkartıyoruz.*/
        //dosyanın orjinal ismini alıyoruz(uzantılı).
        $originalFileName = explode('.', $file->getClientOriginalName());

        //uzantısını kayıt etmek için uzantısını değişkene atıyoruz.
        $extention = array_last($originalFileName);

        //"." işaretine göre parçaladığımız ve diziye attığımız elemanların
        //sonuncu olan uzantıyı diziden siliyoruz.
        unset($originalFileName[count($originalFileName) - 1]);

        //Dizi içerisinden silinmiş olan uzantıdan sonra tüm dizi elemanlarının
        // aralarında boşluk veya işaret olmayacak şekilde değişkene atıyoruz.
        //Böylelikle dosya ismini uzantısız şekilde elde etmiş oluyoruz.
        $name = implode('', $originalFileName);


        //TODO  Storage facede ile cloud işlemleri de yapılabilecek.
//        Storage::put($basePath , $file);
//        $path = Storage::put($basePath , \File::get($file));
//        Storage::disk('public')->put($fileName,\File::get($file));


        $photo = Photo::create([
            'photo_gallery_id' => $gallery->id,
            'name' => $name,
            'slug' => str_slug($name),
            'file' => $fileName,
            'is_active' => 1
        ]);

        $basePath = 'photos/' . $photo->id . '/';
        $file->move($basePath, $fileName);

        $destination = '/photos/' . $photo->id;
        Uploader::fileUpload($photo, 'file', $file, $destination, $fileName);

        $originalPhotoPath = public_path('photos/' . $photo->id . '/' . $fileName);

        Image::make($originalPhotoPath)
            ->fit(58, 58)
            ->save(public_path('photos/' . $photo->id . '/58x58_' . $fileName));

        Image::make($originalPhotoPath)
            ->fit(224, 195)
            ->save(public_path('photos/' . $photo->id . '/224x195_' . $fileName));

        Image::make($originalPhotoPath)
            ->fit(497, 358)
            ->save(public_path('photos/' . $photo->id . '/497x358_' . $fileName));


        /*
         * Dosya eklendiğinde isminin sonuna "- + id" şeklinde ekleme yapmıyor.
         * Sluggable plugin ni için model içerisinde "name + id" yapmamıza rağmen
         * update işlemi yapmamızı zorunlu kılıyor.
         *
         * Bu sorundan dolayı gelen kayıdı slug id si için güncellemememiz gerekiyor.
         *
         * */
        $photoRepo = new PhotoRepository();
        $result = $photoRepo->update($photo->id, [
            'name' => $name
        ]);

        return $photo;
    }


    public function updateGalleryPhotos(Request $request)
    {
        $subtitle = $content = null;

        $inputs = Input::all();

        $photoGalleryId = $inputs['photo_gallery_id'];

        if (!empty($inputs['is_cuff_thumbnail'])) {

            $photoGallery = PhotoGallery::find($photoGalleryId);
            $photo = Photo::find($inputs['is_cuff_thumbnail']);


            $result = PhotoGallery::where('id', $photoGalleryId)
                ->update(['thumbnail' => $photo->file]);


            //todo güncelleme repository tarafında yapılmalı.
//            $photoGallery = $this->repo->update($photoGalleryId, [
//                    'thumbnail' => 'yeni resim'
//                ]);


            $originalPhotoPath = Image::make(public_path('gallery/' . $photoGallery->id . '/photos/' . $photo->file));

            Image::make($originalPhotoPath)
                ->resize(58, 58)
                ->save(public_path('gallery/' . $photoGallery->id . '/photos/58x58_' . $photo->file));

            Image::make($originalPhotoPath)
                ->resize(497, 358)
                ->save(public_path('gallery/' . $photoGallery->id . '/photos/497x358_' . $photo->file));
        }


        unset($inputs['_token']);
        unset($inputs['photo_gallery_id']);
        unset($inputs['is_cuff_thumbnail']);

        //form name alanından gönderdiğimiz  photo id lerini alıyoruz
        //value alanlarını subtitle ve content ile değiştiriyoruz.
        foreach (array_keys($inputs) as $key) {
            if (!empty($inputs[$key])) {
                /*
                 * $fields[0] değeri content veya subtitle olabiliyor
                 * $fields[1] değeri ise formdan verdiğimiz id oluyor.
                 * */

                $fields = explode('/', $key);

                $field = $fields[0];
                $id = $fields[1];

                if ($field == 'delete') {

                    try {

                        Photo::find($id)->delete();
                        //TODO video nun dosyaları da silinecek.
                        continue;
                    } catch (Exception $e) {
                        //todo log yazılacak
                    }

                } else if ($field == 'subtitle') {

                    $subtitle = $inputs[$key];

                } else if ($field == 'content') {

                    $content = $inputs[$key];
                }


                if (is_numeric($id)) {

                    $photo = Photo::find($id);
                    if (isset($photo->id)) {

                        //ikisinden biri boş ise önceki değerini veriyoruz.
                        $photo->subtitle = $subtitle ? $subtitle : $photo->subtitle;
                        $photo->content = $content ? $content : $photo->content;
                        $photo->save();
                    }
                }

                //değişkenleri temizliyoruz.
                $subtitle = null;
                $content = null;
            }

        }


        /*
         * Delete home page cache and related caches
         * */
        $this->removeCacheTags(['PhotoGalleryController']);
        $this->removeHomePageCache();


        return Redirect::back();
    }


    public function tagsPhotoGalleryStore(PhotoGallery $record, $input)
    {
        if (isset($input['tags_ids'])) {
            $record->tags()->sync($input['tags_ids']);
        }
    }
}
