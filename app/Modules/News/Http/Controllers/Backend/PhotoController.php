<?php

namespace App\Modules\News\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;
use App\Library\Uploader;
use App\Modules\News\Http\Requests\PhotoRequest;
use App\Modules\News\Models\Photo;
use App\Modules\News\Models\PhotoGallery;
use App\Modules\News\Repositories\PhotoRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

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
        $records = $this->repo->orderBy('updated_at', 'desc')->paginate();
        return Theme::view('news::' . $this->getViewName(__FUNCTION__),compact(['records']));
    }


    public function create()
    {
        $photoGalleryList = PhotoGallery::photoGalleryList();
        $record = $this->repo->createModel();
        return Theme::view('news::' . $this->getViewName(__FUNCTION__),compact(['record', 'photoGalleryList']));
    }


    public function store(PhotoRequest $request)
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


    public function update(PhotoRequest $request, Photo $record)
    {
        return $this->save($record);
    }


    public function destroy(Photo $record)
    {
        $this->repo->delete($record->id);

        $this->removeCacheTags(['PhotoController']);
        $this->removeHomePageCache();

        return redirect()->route($this->redirectRouteName . $this->view .'index');
    }


    public function save($record)
    {
        $input = Input::all();
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;

        if (isset($record->id)) {
            $result = $this->repo->update($record->id,$input);
        } else {
            $result = $this->repo->create($input);
        }

        if ($result) {

            if(!empty($input['file'])) {

                $destination = '/photos/' . $result->id;
                Uploader::removeDirectory($destination);

                $document_name = $input['file']->getClientOriginalName();
                $destination = '/photos/' . $result->id;
                Uploader::fileUpload($result, 'file', $input['file'], $destination, $document_name);

                $originalPhotoPath = public_path('photos/' . $result->id . '/' . $result->file);

                Image::make($originalPhotoPath)
                    ->resize(58, 58)
                    ->save(public_path('photos/' . $result->id . '/58x58_' . $result->file));

                Image::make($originalPhotoPath)
                    ->resize(224, 195)
                    ->save(public_path('photos/' . $result->id . '/224x195_' . $result->file));

                Image::make($originalPhotoPath)
                    ->resize(497, 358)
                    ->save(public_path('photos/' . $result->id . '/497x358_' . $result->file));
            }
            /*
             * Delete home page cache and related caches
             * */
            $this->removeCacheTags(['PhotoController']);
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
