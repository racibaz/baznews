<?php

namespace App\Modules\News\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;
use App\Models\User;
use App\Modules\News\Http\Requests\RecommendationNewsRequest;
use App\Modules\News\Models\News;
use App\Modules\News\Models\RecommendationNews;
use App\Modules\News\Repositories\RecommendationNewsRepository as Repo;
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
        $this->repo = $repo;
    }


    public function index()
    {
        $records = $this->repo->orderBy('created_at', 'desc')->paginate();
        return view('news::' . $this->getViewName(__FUNCTION__), compact(['records']));
    }


    public function create()
    {
        $userList = User::userList();
        $newsList = News::newsList();
        $record = $this->repo->createModel();

        return view('news::' . $this->getViewName(__FUNCTION__), compact(['record', 'newsList', 'userList']));
    }


    public function store(RecommendationNewsRequest $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(RecommendationNews $record)
    {
//        dd($record);
        return view('news::' . $this->getViewName(__FUNCTION__), compact('record'));
    }


    public function edit(RecommendationNews $record)
    {
        $userList = User::userList();
        $newsList = News::newsList();

        return view('news::' . $this->getViewName(__FUNCTION__), compact(['record', 'newsList', 'userList']));
    }


    public function update(RecommendationNewsRequest $request, RecommendationNews $record)
    {
        return $this->save($record);
    }


    public function destroy(RecommendationNews $record)
    {
        $this->repo->delete($record->id);

        $this->removeCacheTags(['RecommendationNews','NewsController']);
        $this->removeHomePageCache();

        return redirect()->route($this->redirectRouteName . $this->view . 'index');
    }


    public function save($record)
    {
        $input = Input::all();
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;
        $input['is_cuff'] = Input::get('is_cuff') == "on" ? true : false;


        if (isset($record->id)) {
            $result = $this->repo->update($record->id, $input);
        } else {
            $result = $this->repo->create($input);
        }

        if ($result) {

            /*
             * Delete home page cache and related caches
             * */
            $this->removeCacheTags(['NewsController']);
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
