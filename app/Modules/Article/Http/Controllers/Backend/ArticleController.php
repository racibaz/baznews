<?php

namespace App\Modules\Article\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Modules\Article\Models\Article;
use App\Modules\Article\Models\ArticleAuthor;
use App\Modules\Article\Models\ArticleCategory;
use App\Modules\Article\Repositories\ArticleRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Mews\Purifier\Facades\Purifier;

class ArticleController extends Controller
{
    private $repo;
    private $view = 'article.';
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

    public function index($statusCode = null)
    {
        $statusList = [];
        $articleCountByStatus = [];
        $statuses = Article::$statuses;
        foreach ($statuses as  $index => $status){
            if(Auth::user()->can($status . '-article')){
                $statusList[$index] =  $status;
                $articleCountByStatus[$index] = $this->repo->where('status',$index)->findAll()->count();
            }
        }


        //Status durumuna göre verileri getiriyoruz.
        if(is_numeric($statusCode)) {

            if(!key_exists($statusCode,$statusList)){
                Log::warning('Not permission by news status code(' . $statusCode .')  admin.news.index  User id :  ' . Auth::user()->id);
                Session::flash('error_message', trans('common.bad_request'));
                return Redirect::back();
            }

            $records = $this->repo->orderBy('updated_at', 'desc')->where('status',$statusCode)->paginate(50);

        }else{
            $records = $this->repo->orderBy('updated_at', 'desc')->paginate(50);
        }

        $articleCategoryList = ArticleCategory::articleCategoryList();

        return Theme::view('article::' . $this->getViewName(__FUNCTION__),
            compact([
                'records',
                'articleCategoryList',
                'statusList',
                'articleCountByStatus',
            ]));
    }


    public function create()
    {
        $articleCategoryIDs = [];
        $articleCategoryList = ArticleCategory::articleCategoryList();
        $articleAuthorList  = ArticleAuthor::articleAuthorList();
        $record = $this->repo->createModel();
        $statuses = Article::$statuses;

        foreach ($statuses as  $index => $status){
            if(Auth::user()->can($status . '-news')){
                $statusList[$index] =  $status;
            }
        }

        return Theme::view('article::' . $this->getViewName(__FUNCTION__),
            compact([
                'record',
                'articleCategoryIDs',
                'articleCategoryList',
                'articleAuthorList',
                'statusList',
            ]));
    }


    public function store(Request $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(Article $record)
    {
        return Theme::view('article::' . $this->getViewName(__FUNCTION__), compact('record'));
    }


    public function edit(Article $record)
    {
        $articleCategoryIDs = [];
        $articleCategoryList = ArticleCategory::articleCategoryList();
        $articleAuthorList = ArticleAuthor::articleAuthorList();
        $statuses = Article::$statuses;


        foreach ($statuses as  $index => $status){
            if(Auth::user()->can($status . '-news')){
                $statusList[$index] =  $status;
            }
        }

        foreach ($record->article_categories as $index => $article_category) {
            $articleCategoryIDs[$index] = $article_category->id;
        }

        return Theme::view('article::' . $this->getViewName(__FUNCTION__),
            compact([
                'record',
                'articleCategoryIDs',
                'articleCategoryList',
                'articleAuthorList',
                'statusList',
            ]));
    }


    public function update(Request $request, Article $record)
    {
        return $this->save($record);
    }


    public function destroy(Article $record)
    {
        $this->repo->delete($record->id);
        return redirect()->route($this->redirectRouteName . $this->view . 'index');
    }


    public function save($record)
    {
        $input = Input::all();

        $input['is_cuff'] = Input::get('is_cuff') == "on" ? true : false;
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;
        $input['user_id'] = Auth::user()->id;
        $input['content'] = Purifier::clean(Input::get('content'));

        $v = Article::validate($input);

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

                $this->article_article_categories_store($result[1],$input);

                Session::flash('flash_message', trans('common.message_model_updated'));
                return Redirect::route($this->redirectRouteName . $this->view . 'index', $record);
            } else {
                return Redirect::back()
                    ->withErrors(trans('common.save_failed'))
                    ->withInput($input);
            }
        }
    }

    public function article_article_categories_store(Article $record, $input)
    {
        if(isset($input['article_category_ids'])) {
            $record->article_categories()->sync($input['article_category_ids']);
        }
    }
}
