<?php

namespace App\Modules\News\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Modules\News\Models\News;
use App\Modules\News\Models\NewsCategory;
use App\Modules\News\Models\NewsSource;
use App\Modules\News\Repositories\NewsRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller
{
    private $repo;
    private $view = 'news.';
    private $redirectViewName = 'backend.';
    private $redirectRouteName = '';

    public function __construct(Repo $repo)
    {
        $this->repo= $repo;
    }

    public function getViewName($methodName)
    {
        return $this->redirectViewName . $this->view . $methodName;
    }


    public function index()
    {
        $records = $this->repo->orderBy('updated_at', 'desc')->paginate(50);
        $newsCategoryList = NewsCategory::newsCategoryList();
        return Theme::view('news::' . $this->getViewName(__FUNCTION__),compact(['records', 'newsCategoryList']));
    }


    public function create()
    {
        $countryList = Country::countryList();
        $cityList = City::cityList();
        $newsCategoryList = NewsCategory::newsCategoryList();
        $newsSourceList = NewsSource::newsSourceList();
        $statuses = News::$statuses;
        $record = $this->repo->createModel();
        return Theme::view('news::' . $this->getViewName(__FUNCTION__),
            compact(['record', 'countryList', 'cityList', 'newsCategoryList', 'newsSourceList', 'statuses']));
    }


    public function store(Request $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(News $record)
    {
        return Theme::view('news::' . $this->getViewName(__FUNCTION__),compact('record'));
    }


    public function edit(News $record)
    {
        $countryList = Country::countryList();
        $cityList = City::cityList();
        $newsCategoryList = NewsCategory::newsCategoryList();
        $newsSourceList = NewsSource::newsSourceList();
        $statuses = News::$statuses;
        return Theme::view('news::' . $this->getViewName(__FUNCTION__),
            compact(['record', 'countryList', 'cityList', 'newsCategoryList', 'newsSourceList', 'statuses']));
    }


    public function update(Request $request, News $record)
    {
        return $this->save($record);
    }


    public function destroy(News $record)
    {
        $this->repo->delete($record->id);
        return redirect()->route($this->redirectRouteName . $this->view .'index');
    }


    public function save($record)
    {
        $input = Input::all();

        $input['user_id'] = Auth::user()->id;
        $input['band_news'] = Input::get('band_news') == "on" ? true : false;
        $input['box_cuff'] = Input::get('box_cuff') == "on" ? true : false;
        $input['is_cuff'] = Input::get('is_cuff') == "on" ? true : false;
        $input['break_news'] = Input::get('break_news') == "on" ? true : false;
        $input['is_comment'] = Input::get('is_comment') == "on" ? true : false;
        $input['main_cuff'] = Input::get('main_cuff') == "on" ? true : false;
        $input['mini_cuff'] = Input::get('mini_cuff') == "on" ? true : false;
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;

        $v = News::validate($input);

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
                Session::flash('flash_message', trans('common.message_model_updated'));
                return Redirect::route($this->redirectRouteName . $this->view . 'index', $record);
            } else {
                return Redirect::back()
                    ->withErrors(trans('common.save_failed'))
                    ->withInput($input);
            }
        }
    }


    public function newsFilter(Request $request)
    {
        $records = News::
        whereHas('news_categories', function($query)
        {
            if ($news_category_id = Input::get('news_category_id')) {
                $query->where('news_category_id', "$news_category_id");
            }
        })
            ->where(function ($query) {
                if ($id = Input::get('id')) {
                    $query->where('id', "$id");
                }
                if ($title = Input::get('title')) {
                    $query->where('title', 'LIKE', "%$title%");
                }
                if ($slug = Input::get('slug')) {
                    $query->where('slug', 'LIKE', "%$slug%");
                }
                if ($hit = Input::get('hit')) {
                    $query->where('hit', "$hit");
                }
                if ($status = Input::get('status')) {
                    $status = Input::get('status') == "on" ? true : false;
                    $query->where('status', "$status");
                }
                if ($band_news = Input::get('band_news')) {
                    $band_news = Input::get('band_news') == "on" ? true : false;
                    $query->where('band_news', "$band_news");
                }
                if ($box_cuff = Input::get('box_cuff')) {
                    $box_cuff = Input::get('box_cuff') == "on" ? true : false;
                    $query->where('box_cuff', "$box_cuff");
                }
                if ($is_cuff = Input::get('is_cuff')) {
                    $is_cuff = Input::get('is_cuff') == "on" ? true : false;
                    $query->where('is_cuff', "$is_cuff");
                }
                if ($break_news = Input::get('break_news')) {
                    $break_news = Input::get('break_news') == "on" ? true : false;
                    $query->where('break_news', "$break_news");
                }
                if ($main_cuff = Input::get('main_cuff')) {
                    $main_cuff = Input::get('main_cuff') == "on" ? true : false;
                    $query->where('main_cuff', "$main_cuff");
                }
                if ($mini_cuff = Input::get('mini_cuff')) {
                    $mini_cuff = Input::get('mini_cuff') == "on" ? true : false;
                    $query->where('mini_cuff', "$mini_cuff");
                }
                if ($is_comment = Input::get('is_comment')) {
                    $is_comment = Input::get('is_comment') == "on" ? true : false;
                    $query->where('is_comment', "$is_comment");
                }
                if ($is_active = Input::get('is_active')) {
                    $is_active = Input::get('is_active') == "on" ? true : false;
                    $query->where('is_active', "$is_active");
                }
                if ($start_date = Input::get('start_date')) {
                    $query->where('created_at', '>=', "$start_date");
                }
                if ($end_date = Input::get('end_date')) {
                    $query->where('created_at', '<=', "$end_date");
                }
            })
            ->orderBy('updated_at','desc');

        $newsCategoryList = NewsCategory::newsCategoryList();
        $records = $records->paginate(100);

        return Theme::view('news::' . $this->getViewName(__FUNCTION__),compact(['records', 'newsCategoryList']));
    }




}
