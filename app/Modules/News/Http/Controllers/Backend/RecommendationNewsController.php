<?php

namespace App\Modules\News\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;
use App\Models\User;
use App\Modules\News\Models\News;
use App\Modules\News\Models\RecommendationNews;
use App\Modules\News\Repositories\RecommendationNewsRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class RecommendationNewsController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'recommendation_news.';
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
        $userList = User::userList();
        $newsList = News::newsList();
        $record = $this->repo->createModel();

        return Theme::view('news::' . $this->getViewName(__FUNCTION__),compact(['record', 'newsList', 'userList']));
    }


    public function store(Request $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(RecommendationNews $record)
    {
        return Theme::view('news::' . $this->getViewName(__FUNCTION__),compact('record'));
    }


    public function edit(RecommendationNews $record)
    {
        $userList = User::userList();
        $newsList = News::newsList();

        return Theme::view('news::' . $this->getViewName(__FUNCTION__),compact(['record', 'newsList', 'userList']));
    }


    public function update(Request $request, RecommendationNews $record)
    {
        return $this->save($record);
    }


    public function destroy(RecommendationNews $record)
    {
        $this->repo->delete($record->id);
        return redirect()->route($this->redirectRouteName . $this->view .'index');
    }


    public function save($record)
    {
        $input = Input::all();
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;
        $input['is_cuff'] = Input::get('is_cuff') == "on" ? true : false;

        $v = RecommendationNews::validate($input);

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
