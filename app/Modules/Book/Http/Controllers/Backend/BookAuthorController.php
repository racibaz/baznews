<?php

namespace App\Modules\Book\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;
use App\Library\Uploader;
use App\Modules\Book\Models\BookAuthor;
use App\Modules\Book\Repositories\BookAuthorRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;
use Image;

class BookAuthorController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'book_author.';
        $this->redirectViewName = 'backend.';
        $this->repo= $repo;
    }

    public function index()
    {
        $records = $this->repo->orderBy('updated_at', 'desc')->paginate();
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


    public function show(BookAuthor $record)
    {
        return Theme::view('book::' . $this->getViewName(__FUNCTION__),compact(['record']));
    }


    public function edit(BookAuthor $record)
    {
        return Theme::view('book::' . $this->getViewName(__FUNCTION__),compact(['record']));
    }

    public function update(Request $request, BookAuthor $record)
    {
        return $this->save($record);
    }


    public function destroy(BookAuthor $record)
    {
        $this->repo->delete($record->id);

        $this->removeCacheTags(['BookAuthorController']);
        $this->removeHomePageCache();

        return redirect()->route($this->redirectRouteName . $this->view .'index');
    }


    public function save($record)
    {
        $input = Input::all();

        $input['is_cuff'] = Input::get('is_cuff') == "on" ? true : false;
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;
        $input['user_id'] = \Auth::user()->id;

        $rules = array(
            'name' => 'required|min:4|max:255',
            'slug' => [
                Rule::unique('book_authors')->ignore($record->id),
            ],
            'link' => 'url|nullable',
            'thumbnail' => 'image',
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
                    $destination = '/images/book_authors/'. $result->id;
                    Uploader::fileUpload($result , 'thumbnail', $input['thumbnail'] , $destination , $document_name);
                    Uploader::removeFile($oldPath);

                    $thumbnailPath = public_path('images/book_authors/' . $result->id .'/'. $result->thumbnail);

                    Image::make($thumbnailPath)
                        ->fit(58, 58)
                        ->save(public_path('images/book_authors/' . $result->id . '/58x58_' . $document_name));

                    Image::make($thumbnailPath)
                        ->fit(165, 90)
                        ->save(public_path('images/book_authors/' . $result->id . '/165x90_' . $document_name));

                    Image::make($thumbnailPath)
                        ->fit(196, 150)
                        ->save(public_path('images/book_authors/' . $result->id . '/196x150_' . $document_name));

                    Image::make($thumbnailPath)
                        ->fit(220, 310)
                        ->save(public_path('images/book_authors/' . $result->id . '/220x310_' . $document_name));

                    Image::make($thumbnailPath)
                        ->fit(322, 265)
                        ->save(public_path('images/book_authors/' . $result->id . '/322x265_' . $document_name));

                    Image::make($thumbnailPath)
                        ->fit(497, 358)
                        ->save(public_path('images/book_authors/' . $result->id . '/497x358_' . $document_name));
                }



                /*
                 * Delete related caches
                 * */
                $this->removeCacheTags(['BookAuthorController']);
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
