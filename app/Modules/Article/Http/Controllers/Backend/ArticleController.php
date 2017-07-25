<?php

namespace App\Modules\Article\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;
use App\Library\Link\LinkShortener;
use App\Models\Setting;
use App\Modules\Article\Http\Requests\ArticleRequest;
use App\Modules\Article\Models\Article;
use App\Modules\Article\Models\ArticleAuthor;
use App\Modules\Article\Models\ArticleCategory;
use App\Modules\Article\Repositories\ArticleRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use League\Flysystem\Exception;
use Mews\Purifier\Facades\Purifier;
use Mremi\UrlShortener\Model\Link;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class ArticleController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'article.';
        $this->redirectViewName = 'backend.';
        $this->repo = $repo;
    }

    public function index($statusCode = null)
    {
        $statusList = [];
        $articleCountByStatus = [];
        $statuses = Article::$statuses;
        foreach ($statuses as $index => $status) {
            if (Auth::user()->can($status . '-article')) {
                $statusList[$index] = $status;
                $articleCountByStatus[$index] = $this->repo->where('status', $index)->findAll()->count();
            }
        }


        //Status durumuna göre verileri getiriyoruz.
        if (is_numeric($statusCode)) {

            if (!key_exists($statusCode, $statusList)) {
                Log::warning('Not permission by news status code(' . $statusCode . ')  admin.news.index  User id :  ' . Auth::user()->id);
                Session::flash('error_message', trans('common.bad_request'));
                return Redirect::back();
            }

            $records = $this->repo->orderBy('updated_at', 'desc')->where('status', $statusCode)->paginate(50);

        } else {
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
        $articleAuthorList = ArticleAuthor::articleAuthorList();
        $record = $this->repo->createModel();
        $statuses = Article::$statuses;

        foreach ($statuses as $index => $status) {
            if (Auth::user()->can($status . '-news')) {
                $statusList[$index] = $status;
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


    public function store(ArticleRequest $request)
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


        foreach ($statuses as $index => $status) {
            if (Auth::user()->can($status . '-news')) {
                $statusList[$index] = $status;
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


    public function update(ArticleRequest $request, Article $record)
    {
        return $this->save($record);
    }


    public function destroy(Article $record)
    {
        $this->repo->delete($record->id);

        $this->removeCacheTags(['ArticleController', 'Article']);
        $this->removeHomePageCache();

        return redirect()->route($this->redirectRouteName . $this->view . 'index');
    }


    public function save($record)
    {
        $input = Input::all();

        $input['is_cuff'] = Input::get('is_cuff') == "on" ? true : false;
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;
        $input['content'] = Purifier::clean(Input::get('content'));
        $input['order'] = isset($input['order']) ? $input['order'] : 1;


        if (isset($record->id)) {
            $result = $this->repo->update($record->id, $input);
        } else {
            $result = $this->repo->create($input);
        }

        if ($result) {

            $this->articleArticleCategoriesStore($result, $input);

            /*
             * slug değişmiş ise ve link kısaltmaya izin verilmişse
             * google link kısaltma servisi ile 'short_link' alanına ekliyoruz.
             *
             * */
            if (($record->slug != $result->slug) && Setting::isUrlShortener()) {

                try {

                    $linkShortener = new LinkShortener(new Link);
                    $result->short_url = $linkShortener->linkShortener($result->slug);
                    $result->save();

                } catch (Exception $e) {
                    Log::warning(trans('log.link_shortener_error'));
                }
            }

            $this->removeCacheTags(['ArticleController', 'Article']);
            $this->removeHomePageCache();

            Session::flash('flash_message', trans('common.message_model_updated'));
            return Redirect::route($this->redirectRouteName . $this->view . 'index', $result);
        } else {
            return Redirect::back()
                ->withErrors(trans('common.save_failed'))
                ->withInput($input);
        }
    }

    public function articleArticleCategoriesStore(Article $record, $input)
    {
        if (isset($input['article_category_ids'])) {
            $record->article_categories()->sync($input['article_category_ids']);
        }
    }
}
