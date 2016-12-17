<?php

namespace App\Modules\News\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Library\Uploader;
use App\Modules\News\Models\Video;
use App\Modules\News\Models\VideoCategory;
use App\Modules\News\Models\VideoGallery;
use App\Modules\News\Repositories\VideoGalleryRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class VideoGalleryController extends Controller
{

    private $repo;
    private $view = 'video_gallery.';
    private $redirectViewName = 'backend.';
    private $redirectRouteName = '';

    public function __construct(Repo $repo)
    {
        $this->middleware(function ($request, $next) {

            $this->permisson_check();

            return $next($request);
        });

        $this->repo= $repo;
    }

    public function getViewName($methodName)
    {
        return $this->redirectViewName . $this->view . $methodName;
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
        return redirect()->route($this->redirectRouteName . $this->view .'index');
    }


    public function save($record)
    {
        $input = Input::all();

        $input['is_cuff'] = Input::get('is_active') == "on" ? true : false;
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
                if (!empty($result)) {
                    $result = true;
                }
            }
            if ($result[0]) {

                if(!empty($input['thumbnail'])) {
                    $oldPath = $record->thumbnail;
                    $document_name = $input['thumbnail']->getClientOriginalName();
                    $destination = '/video_gallery/'. $result[1]->slug .'/photos';
                    Uploader::fileUpload($result[1] , 'thumbnail', $input['thumbnail'] , $destination , $document_name);
                    Uploader::removeFile($oldPath);


                    Image::make(public_path('video_gallery/'. $result[1]->slug .'/photos/'. $result[1]->thumbnail))
                        ->resize(58,58)
                        ->save(public_path('video_gallery/'. $result[1]->slug .'/photos/58x58_' . $document_name));

                    Image::make(public_path('video_gallery/'. $result[1]->slug .'/photos/'. $result[1]->thumbnail))
                        ->resize(497,358)
                        ->save(public_path('video_gallery/'. $result[1]->slug .'/photos/497x358_' . $document_name));

                    Image::make(public_path('video_gallery/'. $result[1]->slug .'/photos/'. $result[1]->thumbnail))
                        ->resize(658,404)
                        ->save(public_path('video_gallery/'. $result[1]->slug .'/photos/658x404_' . $document_name));
                }


                Session::flash('flash_message', trans('common.message_model_updated'));
                return Redirect::route($this->redirectRouteName . $this->view . 'index', $record);
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

        $basePath = 'video_gallery/' . $gallery->slug . '/videos/';

        $file->move($basePath, $fileName);

        //TODO  Storage facede ile cloud işlemleri de yapılabilecek.

        $photo = $gallery->videos()->create([
            'video_gallery_id'  => $gallery->id,
            'name'              => $fileName,
            'slug'              => str_slug($fileName),
            'file'              => $basePath . $fileName,
            'is_active'         => 1
        ]);

        return $photo;
    }



    public function updateGalleryVideos(Request $request)
    {
        $subtitle = $content = null;

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
                }

                if(is_numeric($id)){

                    $video = Video::find($id);
                    //ikisinden biri boş ise önceki değerini veriyoruz.
                    $video->subtitle =  htmlentities($subtitle) ? htmlentities($subtitle) : $video->subtitle;
                    $video->content =  htmlentities($content) ? htmlentities($content) : $video->content;
                    $video->save();
                }

                //değişkenleri temizliyoruz.
                $subtitle = null;
                $content = null;
            }

        }

        return Redirect::back();
    }

}
