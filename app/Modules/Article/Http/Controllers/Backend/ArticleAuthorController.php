<?php

namespace App\Modules\Article\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Library\Uploader;
use App\Models\User;
use App\Modules\Article\Models\ArticleAuthor;
use App\Modules\Article\Repositories\ArticleAuthorRepository as Repo;
use App\Repositories\UserRepository;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Image;

class ArticleAuthorController extends Controller
{
    private $repo;
    private $view = 'article_author.';
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
        return Theme::view('article::' . $this->getViewName(__FUNCTION__), compact(['records']));
    }


    public function create()
    {
        $record = $this->repo->createModel();
        $userList = User::userList();

        return Theme::view('article::' . $this->getViewName(__FUNCTION__), compact(['record','userList']));
    }


    public function store(Request $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(ArticleAuthor $record)
    {
        return Theme::view('article::' . $this->getViewName(__FUNCTION__), compact('record'));
    }


    public function edit(ArticleAuthor $record)
    {
        $userList = User::userList();
        return Theme::view('article::' . $this->getViewName(__FUNCTION__), compact(['record','userList']));
    }


    public function update(Request $request, ArticleAuthor $record)
    {
        return $this->save($record);
    }


    public function destroy(ArticleAuthor $record)
    {
        $this->repo->delete($record->id);
        return redirect()->route($this->redirectRouteName . $this->view . 'index');
    }


    public function save($record)
    {
        $input = Input::all();

        $input['is_quotation'] = Input::get('is_quotation') == "on" ? true : false;
        $input['is_cuff'] = Input::get('is_cuff') == "on" ? true : false;
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;

        if(!empty($input['user_id'])){

            $userRepo = new UserRepository();
            $user = $userRepo->find($input['user_id']);

            $input['name'] = $user->name;
            $input['slug'] = $user->slug;
            $input['email'] = $user->email;
        }

        $v = ArticleAuthor::validate($input);

        if ($v->fails()) {
            return Redirect::back()
                ->withErrors($v)
                ->withInput($input);
        } else {

            if (isset($record->id)) {
                $result = $this->repo->update($record->id, $input);
            } else {
                $result = $this->repo->create($input);
            }
            if ($result[0]) {

                if(!empty($input['photo'])) {
                    $oldPath = $record->photo;
                    $document_name = $input['photo']->getClientOriginalName();
                    $destination = '/images/article_author_images/'. $result[1]->id .'/original';
                    Uploader::fileUpload($result[1] , 'photo', $input['photo'] , $destination , $document_name);
                    Uploader::removeFile($oldPath);

                    Image::make(public_path('images/article_author_images/' . $result[1]->id .'/original/'. $result[1]->photo))
                        ->fit(58, 58)
                        ->save(public_path('images/article_author_images/' . $result[1]->id . '/58x58_' . $document_name));
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