<?php

namespace App\Modules\Book\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Library\Uploader;
use App\Modules\Book\Models\Book;
use App\Modules\Book\Repositories\BookRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{
    private $repo;
    private $view = 'book.';
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
        $records = $this->repo->findAll();
        return Theme::view('book::' . $this->getViewName(__FUNCTION__),compact(['records']));
    }


    public function create()
    {
        $record = $this->repo->createModel();
        return Theme::view('book::' . $this->getViewName(__FUNCTION__),compact(['record']));
    }


    public function store(Request $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(Book $record)
    {
        return Theme::view('book::' . $this->getViewName(__FUNCTION__),compact(['records']));
    }


    public function edit(Book $record)
    {
        return Theme::view('book::' . $this->getViewName(__FUNCTION__),compact(['record']));
    }


    public function update(Request $request, Book $record)
    {
        return $this->save($record);
    }


    public function destroy(Book $record)
    {
        $this->repo->delete($record->id);
        return redirect()->route($this->redirectRouteName . $this->view .'index');
    }


    public function save($record)
    {
        $input = Input::all();

        $input['is_active'] = Input::get('is_active') == "on" ? true : false;
        $input['is_cuff'] = Input::get('is_cuff') == "on" ? true : false;

        $v = Book::validate($input);

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

                if(!empty($input['thumbnail'])) {
                    $oldPath = $record->thumbnail;
                    $document_name = $input['thumbnail']->getClientOriginalName();
                    $destination = '/images/books/'. $record->id . '/thumbnail';
                    Uploader::fileUpload($record , 'thumbnail', $input['thumbnail'] , $destination , $document_name);
                    Uploader::removeFile($oldPath);
                }

                if(!empty($input['photo'])) {
                    $oldPath = $record->photo;
                    $document_name = $input['photo']->getClientOriginalName();
                    $destination = '/images/books/'. $record->id . '/photo';
                    Uploader::fileUpload($record , 'photo', $input['photo'] , $destination , $document_name);
                    Uploader::removeFile($oldPath);
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
