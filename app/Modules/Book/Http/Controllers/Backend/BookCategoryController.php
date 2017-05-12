<?php

namespace App\Modules\Book\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Controller;
use App\Library\Uploader;
use App\Modules\Book\Models\BookCategory;
use App\Modules\Book\Repositories\BookCategoryRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;
use Image;

class BookCategoryController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'book_category.';
        $this->redirectViewName = 'backend.';
        $this->repo= $repo;
    }

    public function index()
    {
        $records = $this->repo->orderBy('updated_at', 'desc')->findAll();
        $recordsTree = BookCategory::get()->toTree();
        return Theme::view('book::' . $this->getViewName(__FUNCTION__),compact(['records','recordsTree']));
    }


    public function create()
    {
        $record = $this->repo->createModel();
        $bookCategoryList = BookCategory::bookCategoryList();
        return Theme::view('book::' . $this->getViewName(__FUNCTION__),compact(['record','bookCategoryList']));
    }


    public function store(Request $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(BookCategory $record)
    {
        return Theme::view('book::' . $this->getViewName(__FUNCTION__),compact(['record']));
    }


    public function edit(BookCategory $record)
    {
        $bookCategoryList = BookCategory::bookCategoryList();
        return Theme::view('book::' . $this->getViewName(__FUNCTION__),compact(['record','bookCategoryList']));
    }


    public function update(Request $request, BookCategory $record)
    {
        return $this->save($record);
    }


    public function destroy(BookCategory $record)
    {
        $this->repo->delete($record->id);

        $this->removeCacheTags(['BookCategoryController']);
        $this->removeHomePageCache();

        return redirect()->route($this->redirectRouteName . $this->view .'index');
    }


    public function save($record)
    {
        $input = Input::all();

        $input['is_active'] = Input::get('is_active') == "on" ? true : false;
        $input['is_cuff'] = Input::get('is_cuff') == "on" ? true : false;

        $rules = array(
            'name' => 'required|min:4|max:255',
            'slug' => [
                Rule::unique('book_categories')->ignore($record->id),
            ],
            'thumbnail' => 'image|max:255',
            'description' => 'max:255',
            'keywords' => 'max:255',
            'order' => 'integer',
        );
        $v = Validator::make($input, $rules);

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
                    $destination = '/images/books_category/'. $result->id . '/original';
                    Uploader::fileUpload($result  , 'thumbnail', $input['thumbnail'] , $destination , $document_name);
                    Uploader::removeFile($oldPath);

                    Image::make(public_path('images/books_category/' . $result->id .'/original/'. $result->thumbnail))
                        ->fit(180, 275)
                        ->save(public_path('images/books_category/' . $result->id . '/180x275_' . $document_name));
                }


                /*
                 * Delete related caches
                 * */
                $this->removeCacheTags(['BookCategoryController']);
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
}
