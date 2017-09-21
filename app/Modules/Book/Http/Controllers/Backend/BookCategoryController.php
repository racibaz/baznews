<?php

namespace App\Modules\Book\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;
use App\Library\Uploader;
use App\Modules\Book\Http\Requests\BookCategoryRequest;
use App\Modules\Book\Models\BookCategory;
use App\Modules\Book\Repositories\BookCategoryRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Image;

class BookCategoryController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'book_category.';
        $this->redirectViewName = 'backend.';
        $this->repo = $repo;
    }

    public function index()
    {
        $records = $this->repo->orderBy('created_at', 'desc')->paginate();
        $recordsTree = BookCategory::get()->toTree();
        return view('book::' . $this->getViewName(__FUNCTION__), compact(['records', 'recordsTree']));
    }


    public function create()
    {
        $record = $this->repo->createModel();
        $bookCategoryList = BookCategory::bookCategoryList();
        return view('book::' . $this->getViewName(__FUNCTION__), compact(['record', 'bookCategoryList']));
    }


    public function store(BookCategoryRequest $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(BookCategory $record)
    {
        return view('book::' . $this->getViewName(__FUNCTION__), compact(['record']));
    }


    public function edit(BookCategory $record)
    {
        $bookCategoryList = BookCategory::bookCategoryList();
        return view('book::' . $this->getViewName(__FUNCTION__), compact(['record', 'bookCategoryList']));
    }


    public function update(BookCategoryRequest $request, BookCategory $record)
    {
        return $this->save($record);
    }


    public function destroy(BookCategory $record)
    {
        $this->repo->delete($record->id);

        $this->removeCacheTags(['BookCategoryController']);
        $this->removeHomePageCache();

        return redirect()->route($this->redirectRouteName . $this->view . 'index');
    }


    public function save($record)
    {
        $input = Input::all();

        /*
         * Kitap kategorilerini order değerine göre listelediğimiz için
         * order boş ise en son değerin bir fazlasını veriyoruz.
         *
        */
        if (empty($input['order'])) {
            $lastOrder = BookCategory::orderBy('order', 'desc')->first();
            $input['order'] = $lastOrder->order + 1;
        }

        $input['is_active'] = Input::get('is_active') == "on" ? true : false;
        $input['is_cuff'] = Input::get('is_cuff') == "on" ? true : false;


        if (isset($record->id)) {
            $result = $this->repo->update($record->id, $input);
        } else {
            $result = $this->repo->create($input);
        }

        if ($result) {

            if (!empty($input['thumbnail'])) {

                $destination = '/images/books_category/' . $result->id . '/original';
                Uploader::removeDirectory($destination);

                $document_name = $input['thumbnail']->getClientOriginalName();
                Uploader::fileUpload($result, 'thumbnail', $input['thumbnail'], $destination, $document_name);

                Image::make(public_path('images/books_category/' . $result->id . '/original/' . $result->thumbnail))
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
