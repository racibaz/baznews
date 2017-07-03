<?php

namespace App\Modules\News\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;
use App\Modules\News\Http\Requests\PhotoCategoryRequest;
use App\Modules\News\Models\PhotoCategory;
use App\Modules\News\Repositories\PhotoCategoryRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class PhotoCategoryController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'photo_category.';
        $this->redirectViewName = 'backend.';
        $this->repo = $repo;
    }


    public function index()
    {
        $records = $this->repo->orderBy('updated_at', 'desc')->paginate();
        $recordsTree = PhotoCategory::get()->toTree();

        return Theme::view('news::' . $this->getViewName(__FUNCTION__), compact(['records', 'recordsTree']));
    }


    public function create()
    {
        $photoCategoryList = PhotoCategory::photoCategoryList();
        $record = $this->repo->createModel();
        return Theme::view('news::' . $this->getViewName(__FUNCTION__), compact(['record', 'photoCategoryList']));
    }


    public function store(PhotoCategoryRequest $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(PhotoCategory $record)
    {
        return Theme::view('news::' . $this->getViewName(__FUNCTION__), compact('record'));
    }


    public function edit(PhotoCategory $record)
    {
        $photoCategoryList = PhotoCategory::photoCategoryList();
        return Theme::view('news::' . $this->getViewName(__FUNCTION__), compact(['record', 'photoCategoryList']));
    }


    public function update(PhotoCategoryRequest $request, PhotoCategory $record)
    {
        return $this->save($record);
    }


    public function destroy(PhotoCategory $record)
    {
        $this->repo->delete($record->id);
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
            Session::flash('flash_message', trans('common.message_model_updated'));
            return Redirect::route($this->redirectRouteName . $this->view . 'index', $result);
        } else {
            return Redirect::back()
                ->withErrors(trans('common.save_failed'))
                ->withInput($input);
        }
    }
}
