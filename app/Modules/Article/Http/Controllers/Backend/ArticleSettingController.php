<?php

namespace App\Modules\Article\Http\Controllers\Backend;


use App\Http\Controllers\Backend\BackendController;
use App\Modules\Article\Models\ArticleSetting;
use App\Repositories\SettingRepository as Repo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class ArticleSettingController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'article_setting.';
        $this->redirectViewName = 'backend.';
        $this->repo = $repo;
    }

    public function index()
    {
        $records = $this->repo->findAll();
        return view('article::' . $this->getViewName(__FUNCTION__), compact(['records',]));
    }

    public function store(Request $request)
    {
        return $this->save($this->repo->createModel());
    }

    public function save($record)
    {
        $input = Input::all();

        $v = ArticleSetting::validate($input);

        if ($v->fails()) {
            return Redirect::back()
                ->withErrors($v)
                ->withInput($input);
        }

        if (!empty($input['article_count'])) {
            $record = $this->repo->findBy('attribute_key', 'article_count');
            $this->repo->update($record->id, ['attribute_value' => $input['article_count']]);
        }

        if (!empty($input['article_author_count'])) {
            $record = $this->repo->findBy('attribute_key', 'article_author_count');
            $this->repo->update($record->id, ['attribute_value' => $input['article_author_count']]);
        }

        if (!empty($input['recent_article_widget_list_count'])) {
            $record = $this->repo->findBy('attribute_key', 'recent_article_widget_list_count');
            $this->repo->update($record->id, ['attribute_value' => $input['recent_article_widget_list_count']]);
        }

        if (!empty($input['article_authors_widget_list_count'])) {
            $record = $this->repo->findBy('attribute_key', 'article_authors_widget_list_count');
            $this->repo->update($record->id, ['attribute_value' => $input['article_authors_widget_list_count']]);
        }


        $this->removeCacheTags(['Article']);
        $this->removeHomePageCache();

        Session::flash('flash_message', trans('common.message_model_updated'));
        return Redirect::route($this->redirectRouteName . $this->view . 'index');
    }

}
