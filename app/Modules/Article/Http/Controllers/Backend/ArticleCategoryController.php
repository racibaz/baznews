<?php

namespace App\Modules\Article\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;
use App\Modules\Article\Http\Requests\ArticleCategoryRequest;
use App\Modules\Article\Models\ArticleCategory;
use App\Modules\Article\Repositories\ArticleCategoryRepository as Repo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class ArticleCategoryController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'article_category.';
        $this->redirectViewName = 'backend.';
        $this->repo = $repo;
    }


    public function index()
    {
        $records = $this->repo->orderBy('created_at', 'desc')->paginate();
        $recordsTree = ArticleCategory::get()->toTree();

        return view('article::' . $this->getViewName(__FUNCTION__), compact(['records', 'recordsTree']));
    }


    public function create()
    {
        $articleCategoryList = ArticleCategory::articleCategoryList();
        $record = $this->repo->createModel();
        return view('article::' . $this->getViewName(__FUNCTION__), compact(['record', 'articleCategoryList']));
    }


    public function store(ArticleCategoryRequest $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(ArticleCategory $record)
    {
        return view('article::' . $this->getViewName(__FUNCTION__), compact('record'));
    }


    public function edit(ArticleCategory $record)
    {
        $articleCategoryList = ArticleCategory::articleCategoryList();
        return view('article::' . $this->getViewName(__FUNCTION__), compact(['record', 'articleCategoryList']));
    }


    public function update(ArticleCategoryRequest $request, ArticleCategory $record)
    {
        return $this->save($record);
    }


    public function destroy(ArticleCategory $record)
    {
        $this->repo->delete($record->id);

        $this->removeCacheTags(['ArticleCategoryController']);
        $this->removeHomePageCache();

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

            $this->removeCacheTags(['ArticleCategoryController']);
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
