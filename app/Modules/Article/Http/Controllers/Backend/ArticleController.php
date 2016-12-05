<?php

namespace App\Modules\Article\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Modules\Article\Models\Article;
use App\Modules\Article\Models\ArticleCategory;
use App\Modules\Article\Models\Author;
use App\Modules\Article\Repositories\ArticleRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
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
    
    public function index()
    {
        $records = $this->repo->orderBy('updated_at', 'desc')->findAll();
        DB::connection()->enableQueryLog();

        if(Cache::has('articles'))
        {

            $records = Cache::get('articles');
        }else
        {
            $records = Article::all();
            Cache::store('redis')->put('articles', $records, 10);
        }



        $queries  = DB::getQueryLog();
        print_r($queries);


        return Theme::view('article::' . $this->getViewName(__FUNCTION__), compact(['records']));
    }


    public function create()
    {
        $articleCategories = ArticleCategory::articleCategories();
        $authorList = Author::authorList();
        $record = $this->repo->createModel();
        return Theme::view('article::' . $this->getViewName(__FUNCTION__), compact(['record', 'authorList', 'articleCategories']));
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
        $articleCategories = ArticleCategory::articleCategories();
        $authorList = Author::authorList();
        return Theme::view('article::' . $this->getViewName(__FUNCTION__), compact(['record', 'authorList', 'articleCategories']));
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
                if (!empty($result)) {
                    $result = true;
                }
            }
            if ($result) {
                Session::flash('flash_message', trans('common.message_model_updated'));
                return Redirect::route($this->redirectRouteName . $this->view . 'index', $record);
            } else {
                return Redirect::back()
                    ->withErrors(trans('common.save_failed'))
                    ->withInput($input);
            }
        }
    }

    public function article_article_category_store(Request $request)
    {
        $input = Input::all();
        $article_id = $input['article_id'];

        unset($input['article_id']);
        unset($input['_token']);

        $article = Article::find($article_id);
        //$role->permissons->sync($input);

        $article->article_categories()->sync($input);

        return Redirect::back();
    }

}
