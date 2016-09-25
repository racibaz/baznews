<?php

namespace App\Modules\News\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Modules\News\Models\PhotoCategory;
use App\Modules\News\Models\PhotoGallery;
use App\Modules\News\Repositories\PhotoGalleryRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class PhotoGalleryController extends Controller
{
    private $repo;
    private $view = 'photo_gallery.';
    private $redirectViewName = 'backend.';
    private $redirectRouteName = '';

    public function __construct(Repo $repo)
    {
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
        //$photo_gallery = PhotoGallery::find($photo_gallery_id);

        return Theme::view('news::' . $this->redirectViewName . $this->view . 'add_multi_photos_view', compact(['photo_gallery_id']));
    }

    public function addMultiPhotos(Request $request)
    {
        $file = $request->file('file');

        $fileName = uniqid() . $file->getClientOriginalName();

        $file->move('gallery/photos/',$fileName);

        $gallery = PhotoGallery::find($request->input('photo_gallery_id'));

        $photo = $gallery->photos()->create([
            'photo_gallery_id'  => $gallery->id,
            'name'              => $fileName,
            'slug'              => str_slug($fileName),
            'file'              => 'galley/photos/' . $fileName,
            'is_active'         => 1
        ]);

        //protected $fillable = ['photo_gallery_id', 'name', 'slug', 'file', 'link','description', 'keywords', 'order', 'is_active'];
    }



}
