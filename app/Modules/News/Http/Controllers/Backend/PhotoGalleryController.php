<?php

namespace App\Modules\News\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Modules\News\Models\Photo;
use App\Modules\News\Models\PhotoCategory;
use App\Modules\News\Models\PhotoGallery;
use App\Modules\News\Repositories\PhotoGalleryRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use League\Flysystem\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

class PhotoGalleryController extends Controller
{
    private $repo;
    private $view = 'photo_gallery.';
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
        $photoCategories = PhotoCategory::photoCategoryList();
        $record = $this->repo->createModel();
        return Theme::view('news::' . $this->getViewName(__FUNCTION__),compact(['record', 'photoCategories']));
    }


    public function store(Request $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(PhotoGallery $record)
    {
        return Theme::view('news::' . $this->getViewName(__FUNCTION__),compact('record'));
    }


    public function edit(PhotoGallery $record)
    {
        $photoCategories = PhotoCategory::photoCategoryList();
        return Theme::view('news::' . $this->getViewName(__FUNCTION__),compact(['record', 'photoCategories']));
    }


    public function update(Request $request, PhotoGallery $record)
    {
        return $this->save($record);
    }


    public function destroy(PhotoGallery $record)
    {
        $this->repo->delete($record->id);
        return redirect()->route($this->redirectRouteName . $this->view .'index');
    }


    public function save($record)
    {
        $input = Input::all();

        $input['is_active'] = Input::get('is_active') == "on" ? true : false;
        $input['user_id'] = Auth::user()->id;

        $v = PhotoGallery::validate($input);

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
            if ($result) {
                Session::flash('flash_message', trans('common.message_model_updated'));
                return Redirect::route($this->redirectRouteName . $this->view . 'index', $record);
            } else {
                return Redirect::back()
                    ->withErrors(trans('common.save_failed'))
                    ->withInput($input);
            }
        }
    }


    public function addMultiPhotosView($photo_gallery_id)
    {
        $photo_gallery = PhotoGallery::find($photo_gallery_id);

        return Theme::view('news::' . $this->redirectViewName . $this->view . 'add_multi_photos_view', compact(['photo_gallery']));
    }

    //TODO YOUTUBE CLONE EĞİTİMİNDE Kİ GİBİ YAPILACAK JOB,QUEUE VS..
    public function addMultiPhotos(Request $request)
    {
        $gallery = PhotoGallery::find($request->input('photo_gallery_id'));

        $file = $request->file('file');

        $fileName = uniqid() . $file->getClientOriginalName();

        $basePath = 'gallery/' . $gallery->slug . '/photos/';

        $file->move($basePath, $fileName);

        //TODO  Storage facede ile cloud işlemleri de yapılabilecek.
//        Storage::put($basePath , $file);
//        $path = Storage::put($basePath , \File::get($file));
//        Storage::disk('public')->put($fileName,\File::get($file));

        $photo = $gallery->photos()->create([
            'photo_gallery_id'  => $gallery->id,
            'name'              => $fileName,
            'slug'              => str_slug($fileName),
            'file'              => $basePath . $fileName,
            'is_active'         => 1
        ]);

        return $photo;
    }



    public function updateGalleryPhotos(Request $request)
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

                        Photo::find($id)->delete();
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

                    $photo = Photo::find($id);
                    //ikisinden biri boş ise önceki değerini veriyoruz.
                    $photo->subtitle =  htmlentities($subtitle) ? htmlentities($subtitle) : $photo->subtitle;
                    $photo->content =  htmlentities($content) ? htmlentities($content) : $photo->content;
                    $photo->save();
                }

                //değişkenleri temizliyoruz.
                $subtitle = null;
                $content = null;
            }

        }

        return Redirect::back();
    }



}
