<?php

namespace App\Modules\News\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;
use App\Library\Uploader;
use App\Modules\News\Models\Video;
use App\Modules\News\Models\VideoCategory;
use App\Modules\News\Models\VideoGallery;
use App\Modules\News\Repositories\VideoGalleryRepository as Repo;
use App\Modules\News\Repositories\VideoRepository;
use Caffeinated\Themes\Facades\Theme;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class VideoGalleryController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'video_gallery.';
        $this->redirectViewName = 'backend.';
        $this->repo= $repo;
    }


    public function index()
    {
        $records = $this->repo->orderBy('updated_at', 'desc')->findAll();
        return Theme::view('news::' . $this->getViewName(__FUNCTION__),compact(['records']));
    }


    public function create()
    {
        $videoCategories = VideoCategory::videoCategoryList();
        $record = $this->repo->createModel();
        return Theme::view('news::' . $this->getViewName(__FUNCTION__),compact(['record', 'videoCategories']));
    }


    public function store(Request $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(VideoGallery $record)
    {
        return Theme::view('news::' . $this->getViewName(__FUNCTION__),compact('record'));
    }


    public function edit(VideoGallery $record)
    {
        $videoCategories = VideoCategory::videoCategoryList();
        return Theme::view('news::' . $this->getViewName(__FUNCTION__),compact(['record', 'videoCategories']));
    }


    public function update(Request $request, VideoGallery $record)
    {
        return $this->save($record);
    }


    public function destroy(VideoGallery $record)
    {
        $this->repo->delete($record->id);

        $this->removeCacheTags(['VideoGalleryController']);
        $this->removeHomePageCache();

        return redirect()->route($this->redirectRouteName . $this->view .'index');
    }


    public function save($record)
    {
        $input = Input::all();
        $input['is_cuff'] = Input::get('is_cuff') == "on" ? true : false;
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;
        $input['user_id'] = Auth::user()->id;

        $v = VideoGallery::validate($input);

        if ($v->fails()) {
            return Redirect::back()
                ->withErrors($v)
                ->withInput($input);
        } else {

            if (isset($record->id)) {
                $result = $this->repo->update($record->id,$input);
            } else {
                $result = $this->repo->create($input);
            }

            if ($result) {

                if(!empty($input['thumbnail'])) {
                    $oldPath = $record->thumbnail;
                    $document_name = $input['thumbnail']->getClientOriginalName();
                    $destination = '/video_gallery/'. $result->id .'/photos';
                    Uploader::fileUpload($result , 'thumbnail', $input['thumbnail'] , $destination , $document_name);
                    Uploader::removeFile($oldPath);


                    Image::make(public_path('video_gallery/'. $result->id .'/photos/'. $result->thumbnail))
                        ->resize(58,58)
                        ->save(public_path('video_gallery/'. $result->id .'/photos/58x58_' . $document_name));

                    Image::make(public_path('video_gallery/'. $result->id .'/photos/'. $result->thumbnail))
                        ->resize(497,358)
                        ->save(public_path('video_gallery/'. $result->id .'/photos/497x358_' . $document_name));

                    Image::make(public_path('video_gallery/'. $result->id .'/photos/'. $result->thumbnail))
                        ->resize(658,404)
                        ->save(public_path('video_gallery/'. $result->id .'/photos/658x404_' . $document_name));

                    Image::make(public_path('video_gallery/'. $result->id .'/photos/'. $result->thumbnail))
                        ->resize(224,195)
                        ->save(public_path('video_gallery/'. $result->id .'/photos/224x195_' . $document_name));

                    Image::make(public_path('video_gallery/'. $result->id .'/photos/'. $result->thumbnail))
                        ->resize(165,90)
                        ->save(public_path('video_gallery/'. $result->id .'/photos/165x90_' . $document_name));

                    Image::make(public_path('video_gallery/'. $result->id .'/photos/'. $result->thumbnail))
                        ->resize(457,250)
                        ->save(public_path('video_gallery/'. $result->id .'/photos/257x250_' . $document_name));

                    Image::make(public_path('video_gallery/'. $result->id .'/photos/'. $result->thumbnail))
                        ->resize(213, 116)
                        ->save(public_path('video_gallery/'. $result->id .'/photos/213x116_' . $document_name));
                }


                /*
                 * Delete home page cache and related caches
                 * */
                $this->removeCacheTags(['VideoGalleryController']);
                $this->removeHomePageCache();


                Session::flash('flash_message', trans('common.message_model_updated'));
                return Redirect::route($this->redirectRouteName . $this->view . 'index', $result);
            } else {
                return Redirect::back()
                    ->withErrors(trans('common.save_failed'))
                    ->withInput($input);
            }
        }
    }


    public function addMultiVideosView($video_gallery_id)
    {
        $video_gallery = VideoGallery::find($video_gallery_id);

        return Theme::view('news::' . $this->redirectViewName . $this->view . 'add_multi_videos_view', compact(['video_gallery']));
    }

    //TODO YOUTUBE CLONE EĞİTİMİNDE Kİ GİBİ YAPILACAK JOB,QUEUE VS..
    public function addMultiVideos(Request $request)
    {
        $gallery = VideoGallery::find($request->input('video_gallery_id'));
        $file = $request->file('file');
        $fileName = uniqid() . $file->getClientOriginalName();
        $basePath = 'video_gallery/' . $gallery->id . '/videos/';

        /*dosya isminden extension kısmını çıkartıyoruz.*/
        //dosyanın orjinal ismini alıyoruz(uzantılı).
        $originalFileName =  explode('.', $file->getClientOriginalName());

        //uzantısını kayıt etmek için uzantısını değişkene atıyoruz.
        $extention = array_last($originalFileName);

        //"." işaretine göre parçaladığımız ve diziye attığımız elemanların
        //sonuncu olan uzantıyı diziden siliyoruz.
        unset($originalFileName[count($originalFileName) - 1]);

        //Dizi içerisinden silinmiş olan uzantıdan sonra tüm dizi elemanlarının
        // aralarında boşluk veya işaret olmayacak şekilde değişkene atıyoruz.
        //Böylelikle dosya ismini uzantısız şekilde elde etmiş oluyoruz.
        $name = implode('', $originalFileName);

        $file->move($basePath, $fileName);

        //TODO  Storage facede ile cloud işlemleri de yapılabilecek.

        $video = $gallery->videos()->create([
            'video_gallery_id'  => 1,
            'name'              => $name,
            'slug'              => str_slug($name),
            'file'              => $fileName,
            'is_active'         => 1
        ]);

        $videoRepo = new VideoRepository();
        $result = $videoRepo->update($video->id,[
            'name' => $name
        ]);

        return $video;
    }



    public function updateGalleryVideos(Request $request)
    {
        $subtitle = $content = $order = $isActive = $link =   null;

        $inputs = Input::all();

        unset($inputs['_token']);

        //form name alanından gönderdiğimiz  photo id lerini alıyoruz
        //value alanlarını subtitle ve content ile değiştiriyoruz.
        foreach (array_keys($inputs) as $key)
        {
            if(!empty($inputs[$key]))
            {
                /*
                 * $fields[0] değeri content veya subtitle olabiliyor
                 * $fields[1] değeri ise formdan verdiğimiz id oluyor.
                 * */

                $fields = explode('/',$key);

                $field = $fields[0];
                $id = $fields[1];

                if($field == 'delete'){
                    try{
                        $video =  Video::find($id)->delete();
                        //TODO video nun dosyaları da silinecek.
                        continue;
                    }catch (Exception $e)
                    {
                        //todo log yazılacak
                    }

                }else if($field == 'subtitle'){

                    $subtitle = $inputs[$key];

                }else if($field == 'content'){

                    $content = $inputs[$key];

                }else if($field == 'link'){

                    $link = $inputs[$key];

                }else if($field == 'order'){

                    $order = $inputs[$key];

                }else if($field == 'is_active'){

                    $isActive = $inputs[$key] == "on" ? true : false;

                }else if($field == 'thumbnail'){

                    $record = Video::find($id);

                    $oldPath = !empty($record->thumbnail) ? $record->thumbnail : null;
                    $document_name = $inputs['thumbnail/'. $record->id]->getClientOriginalName();
                    $destination = '/video_gallery/'. $record->video_gallery_id .'/photos';
                    Uploader::fileUpload($record , 'thumbnail', $inputs['thumbnail/'. $record->id] , $destination , $document_name);
                    Uploader::removeFile($oldPath);


                    Image::make(public_path('video_gallery/'. $record->video_gallery_id .'/photos/'. $record->thumbnail))
                        ->resize(58,58)
                        ->save(public_path('video_gallery/'. $record->video_gallery_id .'/photos/58x58_' . $document_name));

                    Image::make(public_path('video_gallery/'. $record->video_gallery_id .'/photos/'. $record->thumbnail))
                        ->resize(497,358)
                        ->save(public_path('video_gallery/'. $record->video_gallery_id .'/photos/497x358_' . $document_name));

                    Image::make(public_path('video_gallery/'. $record->video_gallery_id .'/photos/'. $record->thumbnail))
                        ->resize(658,404)
                        ->save(public_path('video_gallery/'. $record->video_gallery_id .'/photos/658x404_' . $document_name));

                    Image::make(public_path('video_gallery/'. $record->video_gallery_id .'/photos/'. $record->thumbnail))
                        ->resize(224,195)
                        ->save(public_path('video_gallery/'. $record->video_gallery_id .'/photos/224x195_' . $document_name));

                    Image::make(public_path('video_gallery/'. $record->video_gallery_id .'/photos/'. $record->thumbnail))
                        ->resize(165,90)
                        ->save(public_path('video_gallery/'. $record->video_gallery_id .'/photos/165x90_' . $document_name));

                    Image::make(public_path('video_gallery/'. $record->video_gallery_id .'/photos/'. $record->thumbnail))
                        ->resize(457,250)
                        ->save(public_path('video_gallery/'. $record->video_gallery_id .'/photos/257x250_' . $document_name));

                    Image::make(public_path('video_gallery/'. $record->video_gallery_id .'/photos/'. $record->thumbnail))
                        ->resize(213, 116)
                        ->save(public_path('video_gallery/'. $record->video_gallery_id .'/photos/213x116_' . $document_name));

                }

                if(is_numeric($id)){

                    $video = Video::find($id);

                    //video silinmemiş ise işleme devam ediyoruz.
                    if(!empty($video)){
                        //ikisinden biri boş ise önceki değerini veriyoruz.
                        $video->subtitle =  $subtitle ? $subtitle : $video->subtitle;
                        $video->content =  $content ? $content : $video->content;
                        $video->link =  $link ? $link : $video->link;
                        $video->order =  $order ? $order : $video->order;
                        $video->is_active =  $isActive == true ? true : false;
                        $video->save();
                    }
                }
                //değişkenleri temizliyoruz.
                $subtitle = $content = $link = $order = $isActive = null;
            }
        }

        $this->removeCacheTags(['VideoGalleryController']);
        $this->removeHomePageCache();

        return Redirect::back();
    }
}
