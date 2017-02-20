<?php

namespace App\Modules\Book\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Library\Uploader;
use App\Modules\Book\Models\BookCategory;
use App\Modules\Book\Repositories\BookCategoryRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Image;

class BookCategoryController extends Controller
{
    private $repo;
    private $view = 'book_category.';
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
        return Theme::view('book::' . $this->getViewName(__FUNCTION__),compact(['records']));
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
        return redirect()->route($this->redirectRouteName . $this->view .'index');
    }


    public function save($record)
    {
        $input = Input::all();

        $input['is_active'] = Input::get('is_active') == "on" ? true : false;
        $input['is_cuff'] = Input::get('is_cuff') == "on" ? true : false;

        $v = BookCategory::validate($input);

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
            if ($result[0]) {

                if(!empty($input['thumbnail'])) {

                    $oldPath = $record->thumbnail;
                    $document_name = $input['thumbnail']->getClientOriginalName();
                    $destination = '/images/books_category/'. $result[1]->id . '/original';
                    Uploader::fileUpload($result[1]  , 'thumbnail', $input['thumbnail'] , $destination , $document_name);
                    Uploader::removeFile($oldPath);

                    Image::make(public_path('images/books_category/' . $result[1]->id .'/original/'. $result[1]->thumbnail))
                        ->fit(180, 275)
                        ->save(public_path('images/books_category/' . $result[1]->id . '/180x275_' . $document_name));
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
}
