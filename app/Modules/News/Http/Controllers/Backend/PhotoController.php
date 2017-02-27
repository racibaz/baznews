<?php

namespace App\Modules\News\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;
use App\Modules\News\Models\Photo;
use App\Modules\News\Models\PhotoGallery;
use App\Modules\News\Repositories\PhotoRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class PhotoController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'photo.';
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
        $photoGalleryList = PhotoGallery::photoGalleryList();
        $record = $this->repo->createModel();
        return Theme::view('news::' . $this->getViewName(__FUNCTION__),compact(['record', 'photoGalleryList']));
    }


    public function store(Request $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(Photo $record)
    {
        return Theme::view('news::' . $this->getViewName(__FUNCTION__),compact('record'));
    }


    public function edit(Photo $record)
    {
        $photoGalleryList = PhotoGallery::photoGalleryList();
        return Theme::view('news::' . $this->getViewName(__FUNCTION__),compact(['record', 'photoGalleryList']));
    }


    public function update(Request $request, Photo $record)
    {
        return $this->save($record);
    }


    public function destroy(Photo $record)
    {
        $this->repo->delete($record->id);
        return redirect()->route($this->redirectRouteName . $this->view .'index');
    }


    public function save($record)
    {
        $input = Input::all();
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;

        $v = Photo::validate($input);

        if ($v->fails()) {
            return Redirect::back()
                ->withErrors($v)
                ->withInput($input);
        } else {

            if (isset($record->id)) {
                list($status, $instance) = $this->repo->update($record->id,$input);
            } else {
                list($status, $instance) = $this->repo->create($input);
            }

            if ($status) {
                Session::flash('flash_message', trans('common.message_model_updated'));
                return Redirect::route($this->redirectRouteName . $this->view . 'index', $instance);
            } else {
                return Redirect::back()
                    ->withErrors(trans('common.save_failed'))
                    ->withInput($input);
            }
        }
    }
}
