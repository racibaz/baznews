<?php

namespace App\Modules\News\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Jobs\Cache\FlushAll;
use App\Jobs\Cache\FlushAllCache;
use App\Jobs\File\ImageUpload;
use App\Jobs\File\ImageUploader;
use App\Library\Uploader;
use App\Models\City;
use App\Models\Country;
use App\Models\Tag;
use App\Modules\News\Models\News;
use App\Modules\News\Models\NewsCategory;
use App\Modules\News\Models\NewsSource;
use App\Modules\News\Models\RelatedNews;
use App\Modules\News\Repositories\NewsRepository as Repo;
use App\Modules\News\Repositories\RecommendationNewsRepository;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Mapper;

class NewsController extends Controller
{
    private $repo;
    private $view = 'news.';
    private $redirectViewName = 'backend.';
    private $redirectRouteName = '';
    private $oldPath;

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
        Mapper::map(41.015137, 28.979530, ['zoom' => 10, 'markers' => ['title' => 'My Location', 'animation' => 'DROP'], 'clusters' => ['size' => 10, 'center' => true, 'zoom' => 20]]);
        Mapper::informationWindow(41.015137, 28.979530, 'haber başlık linki',
            [
                'open' => true, 'maxWidth'=> 300, 'markers' => ['title' => 'haber başlığı'],
                'markers' => ['symbol' => 'circle', 'scale' => 1000, 'animation' => 'DROP']
            ]);
        $googleMapsRender = Mapper::render();

        $newsCategories = NewsCategory::where('is_active', 1)->get();
        $countryList = Country::countryList();
        $cityList = City::cityList();
        $newsCategoryList = NewsCategory::newsCategoryList();
        $newsSourceList = NewsSource::newsSourceList();
        $statuses = News::$statuses;
        $record = $this->repo->createModel();
        return Theme::view('news::' . $this->getViewName(__FUNCTION__),
            compact(['record', 'countryList', 'cityList', 'newsCategoryList', 'newsSourceList', 'statuses','googleMapsRender','newsCategories']));
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
        Mapper::map(41.015137, 28.979530, ['zoom' => 10, 'markers' => ['title' => 'My Location', 'animation' => 'DROP'], 'clusters' => ['size' => 10, 'center' => true, 'zoom' => 20]]);
        Mapper::informationWindow(41.015137, 28.979530, 'haber başlık linki',
            [
                'open' => true, 'maxWidth'=> 300, 'markers' => ['title' => 'haber başlığı'],
                'markers' => ['symbol' => 'circle', 'scale' => 1000, 'animation' => 'DROP']
            ]);
        $googleMapsRender = Mapper::render();

        $relatedIDs = [];
        $tagIDs = [];
        $newsList = News::newsAllList();
        $newsCategories = NewsCategory::where('is_active', 1)->get();
        $countryList = Country::countryList();
        $cityList = City::cityList();
        $newsCategoryList = NewsCategory::newsCategoryList();
        $newsSourceList = NewsSource::newsSourceList();
        $newsSourceList = NewsSource::newsSourceList();
        $statuses = News::$statuses;
        $futureNews = $record->future_news;
        $recommendationNews = $record->recommendation_news;
        $tagList = Tag::tagList();


        foreach ($record->related_news as $index => $related_new) {
            $relatedIDs[$index] = $related_new->related_news_id;
        }

        foreach ($record->tags as $index => $tag){
            $tagIDs[$index] = $tag->id;
        }


        return Theme::view('news::' . $this->getViewName(__FUNCTION__),
            compact(['record', 'newsList', 'countryList', 'cityList', 'newsCategoryList', 'newsSourceList', 'statuses', 'googleMapsRender','newsCategories', 'futureNews', 'recommendationNews', 'relatedIDs', 'tagList', 'tagIDs']));
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

                if(!empty($input['thumbnail'])) {
                    $oldPath = $record->thumbnail;
                    $document_name = $input['thumbnail']->getClientOriginalName();
                    $destination = '/images/news_images/'. $record->id .'/thumbnail';
                    Uploader::fileUpload($record , 'thumbnail', $input['thumbnail'] , $destination , $document_name);
                    Uploader::removeFile($oldPath);
                }

                if(!empty($input['cuff_photo'])) {
                    $oldPath = $record->cuff_photo;
                    $document_name = $input['cuff_photo']->getClientOriginalName();
                    $destination = '/images/news_images/'. $record->id .'/cuff_photo' ;
                    Uploader::fileUpload($record , 'cuff_photo', $input['cuff_photo'] , $destination , $document_name);
                    Uploader::removeFile($oldPath);
                }

                //$this->dispatch(new ImageUploader($record, $input['thumbnail'], $destination, $document_name, $document_name));

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


    public function news_news_categories_store(Request $request)
    {
        $input = Input::all();
        $news_id = $input['news_id'];

        unset($input['news_id']);
        unset($input['_token']);

        $record = News::find($news_id);
        $record->news_categories()->sync($input);

        return Redirect::back();
    }

    public function future_news_store(Request $request)
    {
        $input = Input::all();
        $news_id = $input['news_id'];
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;

        $record = News::find($news_id);

        if(empty($record)){

            return Redirect::back()
                ->withErrors(trans('common.save_failed'))
                ->withInput($input);
        }

        if(empty($input['future_datetime'])){

            return Redirect::back()
                ->withErrors(trans('common.save_failed'))
                ->withInput($input);
        }


        $futureNews = $record->future_news;
        $futureNews->future_datetime = $input['future_datetime'];
        $futureNews->is_active = $input['is_active'];
        $futureNews->save();

        Log::info('Future news updated by ' . Auth::user()->id);
        Session::flash('flash_message', trans('news::news.future_news_updated'));
        return Redirect::back();
    }

    public function recommendation_news_store(Request $request)
    {
        $input = Input::all();
        $news_id = $input['news_id'];
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;
        $input['is_cuff'] = Input::get('is_cuff') == "on" ? true : false;

        $record = News::find($news_id);

        if(empty($record)){

            return Redirect::back()
                ->withErrors(trans('common.save_failed'))
                ->withInput($input);
        }

        if(empty($input['order'])){

            return Redirect::back()
                ->withErrors(trans('common.save_failed'))
                ->withInput($input);
        }


        $rerecommdationNewsController = new RecommendationNewsController( new RecommendationNewsRepository());
        $rerecommdationNewsController->save($record);
        //TODO user_id sorunu çözülecek.

//
//        $recommdationNews = $record->recommendation_news;
//        $recommdationNews->user_id = Auth::user()->id;
//        $recommdationNews->order = $input['order'];
//        $recommdationNews->is_active = $input['is_active'];
//        $recommdationNews->is_cuff = $input['is_cuff'];
//        $recommdationNews->save();



        $this->dispatch(new FlushAll('laravel'));

        Log::info('Recommendation  news updated by ' . Auth::user()->id);
        Session::flash('flash_message', trans('news::news.future_news_updated'));
        return Redirect::back();
    }



    public function related_news_news_store(Request $request)
    {
        $input = Input::all();

        $news_id = $input['news_id'];

        unset($input['news_id']);
        unset($input['_token']);

        $record = News::find($news_id);

        RelatedNews::where('news_id',$news_id)->delete();

        foreach ($input['related_news_ids'] as $in){

            $relatedNews = new RelatedNews();
            $relatedNews->news_id = $news_id;
            $relatedNews->related_news_id =  $in;
            $relatedNews->save();

        }

        return Redirect::back();
    }

    public function tags_news_store(Request $request)
    {
        $input = Input::all();
        $news_id = $input['news_id'];

        unset($input['news_id']);
        unset($input['_token']);

        $record = News::find($news_id);
        $record->tags()->sync($input['tags_ids']);

        return Redirect::back();
    }




}
