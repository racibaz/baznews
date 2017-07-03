<?php

namespace App\Modules\News\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;
use App\Modules\News\Http\Requests\VideoCategoryRequest;
use App\Modules\News\Models\VideoCategory;
use App\Modules\News\Repositories\VideoCategoryRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class VideoCategoryController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'video_category.';
        $this->redirectViewName = 'backend.';
        $this->repo = $repo;
    }


    public function index()
    {
        $records = $this->repo->orderBy('updated_at', 'desc')->paginate();
        $recordsTree = VideoCategory::get()->toTree();

        return Theme::view('news::' . $this->getViewName(__FUNCTION__), compact(['records', 'recordsTree']));
    }


    public function create()
    {
        $videoCategoryList = VideoCategory::videoCategoryList();
        $record = $this->repo->createModel();
        return Theme::view('news::' . $this->getViewName(__FUNCTION__), compact(['record', 'videoCategoryList']));
    }


    public function store(VideoCategoryRequest $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(VideoCategory $record)
    {
        return Theme::view('news::' . $this->getViewName(__FUNCTION__), compact('record'));
    }


    public function edit(VideoCategory $record)
    {
        $videoCategoryList = VideoCategory::videoCategoryList();
        return Theme::view('news::' . $this->getViewName(__FUNCTION__), compact(['record', 'videoCategoryList']));
    }


    public function update(VideoCategoryRequest $request, VideoCategory $record)
    {
        return $this->save($record);
    }


    public function destroy(VideoCategory $record)
    {
        $this->repo->delete($record->id);

        $this->removeCacheTags(['VideoController', 'VideoGalleryController']);
        $this->removeHomePageCache();

        return redirect()->route($this->redirectRouteName . $this->view . 'index');
    }


    public function save($record)
    {
        $input = Input::all();
        $input['is_cuff'] = Input::get('is_cuff') == "on" ? true : false;
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;


        if (isset($record->id)) {
            $result = $this->repo->update($record->id, $input);
        } else {
            $result = $this->repo->create($input);
        }

        if ($result) {

            /*
             * Delete home page cache and related caches
             * */
            $this->removeCacheTags(['VideoController', 'VideoGalleryController']);
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
