<?php

namespace App\Modules\News\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Jobs\File\ImageUpload;
use App\Library\Uploader;
use App\Models\City;
use App\Models\Country;
use App\Models\Tag;
use App\Modules\News\Models\FutureNews;
use App\Modules\News\Models\News;
use App\Modules\News\Models\NewsCategory;
use App\Modules\News\Models\NewsSource;
use App\Modules\News\Models\Photo;
use App\Modules\News\Models\PhotoGallery;
use App\Modules\News\Models\RecommendationNews;
use App\Modules\News\Models\RelatedNews;
use App\Modules\News\Models\Video;
use App\Modules\News\Models\VideoGallery;
use App\Modules\News\Repositories\NewsRepository as Repo;
use App\Repositories\TagRepository;
use Caffeinated\Themes\Facades\Theme;
use Mapper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use phpDocumentor\Reflection\Types\Integer;

class NewsController extends Controller
{
    private $repo;
    private $view = 'news.';
    private $redirectViewName = 'backend.';
    private $redirectRouteName = '';
    private $oldPath;

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
        $statusList = [];
        $statuses = News::$statuses;
        foreach ($statuses as  $index => $status){
            if(Auth::user()->can($status . '-news')){
                $statusList[$index] =  $status;
            }
        }


        $records = $this->repo->orderBy('updated_at', 'desc')->paginate(50);
        $newsCategoryList = NewsCategory::newsCategoryList();

        return Theme::view('news::' . $this->getViewName(__FUNCTION__),compact([
            'records',
            'newsCategoryList',
            'statusList',
        ]));
    }

    public function create()
    {
        $relatedIDs = [];
        $tagIDs = [];
        $photoGalleryIDs = [];
        $videosIDs = [];
        $photosIDs = [];
        $videoGalleryIDs = [];
        $newsCategoryIDs = [];
        $statusList = [];
        $newsList = News::newsAllList();
        $newsCategories = NewsCategory::where('is_active', 1)->get();
        $countryList = Country::countryList();
        $cityList = City::cityList();
        $newsCategoryList = NewsCategory::newsCategoryList();
        $newsSourceList = NewsSource::newsSourceList();
        $newsSourceList = NewsSource::newsSourceList();
        $statuses = News::$statuses;
        $futureNews = new FutureNews();
        $recommendationNews = new RecommendationNews();
        $tagList = Tag::tagList();
        $photoGalleriesList = PhotoGallery::photoGalleryList();
        $videoGalleriesList = VideoGallery::videoGalleryList();
        $videoList = Video::videoList();
        $photoList = Photo::photoList();
        $newsTypes = News::$newsTypes;

        $record = $this->repo->createModel();

        foreach ($statuses as  $index => $status){

            if(Auth::user()->can($status . '-news')){
                $statusList[$index] =  $status;
            }
        }


        return Theme::view('news::' . $this->getViewName(__FUNCTION__),
            compact(['record',
                'newsList',
                'countryList',
                'cityList',
                'newsCategoryList',
                'newsSourceList',
                'statusList',
                'newsCategories',
                'futureNews',
                'recommendationNews',
                'relatedIDs',
                'tagList',
                'tagIDs',
                'photoGalleriesList',
                'photoGalleryIDs',
                'videoGalleriesList',
                'videoGalleryIDs',
                'videoList',
                'videosIDs',
                'photoList',
                'photosIDs',
                'newsCategoryIDs',
                'newsTypes'
            ]));
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
        $relatedIDs = [];
        $tagIDs = [];
        $photoGalleryIDs = [];
        $videosIDs = [];
        $photosIDs = [];
        $videoGalleryIDs = [];
        $newsCategoryIDs = [];
        $statusList = [];
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
        $photoGalleriesList = PhotoGallery::photoGalleryList();
        $videoGalleriesList = VideoGallery::videoGalleryList();
        $videoList = Video::videoList();
        $photoList = Photo::photoList();
        $newsTypes = News::$newsTypes;


        foreach ($record->photos as $index => $photo) {
            $photosIDs[$index] = $photo->id;
        }

        foreach ($record->videos as $index => $video) {
            $videosIDs[$index] = $video->id;
        }


        foreach ($record->related_news as $index => $related_new) {
            $relatedIDs[$index] = $related_new->related_news_id;
        }

        foreach ($record->tags as $index => $tag){
            $tagIDs[$index] = $tag->id;
        }

        foreach ($record->photo_galleries as $index => $photo_gallery) {
            $photoGalleryIDs[$index] = $photo_gallery->id;
        }

        foreach ($record->video_galleries as $index => $video_gallery) {
            $videoGalleryIDs[$index] = $video_gallery->id;
        }

        foreach ($record->news_categories as $index => $news_category) {
            $newsCategoryIDs[$index] = $news_category->id;
        }

        foreach ($statuses as  $index => $status){

            if(Auth::user()->can($status . '-news')){
                $statusList[$index] =  $status;
            }
        }


        return Theme::view('news::' . $this->getViewName(__FUNCTION__),
            compact(['record',
                'newsList',
                'countryList',
                'cityList',
                'newsCategoryList',
                'newsSourceList',
                'statusList',
                'newsCategories',
                'futureNews',
                'recommendationNews',
                'relatedIDs',
                'tagList',
                'tagIDs',
                'photoGalleriesList',
                'photoGalleryIDs',
                'videoGalleriesList',
                'videoGalleryIDs',
                'videoList',
                'videosIDs',
                'photoList',
                'photosIDs',
                'newsCategoryIDs',
                'newsTypes'
            ]));
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
        $input['main_cuff'] = Input::get('main_cuff') == "on" ? true : false;
        $input['mini_cuff'] = Input::get('mini_cuff') == "on" ? true : false;
        $input['is_comment'] = Input::get('is_comment') == "on" ? true : false;
        $input['is_show_editor_profile'] = Input::get('is_show_editor_profile') == "on" ? true : false;
        $input['is_show_previous_and_next_news'] = Input::get('is_show_previous_and_next_news') == "on" ? true : false;
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;


        /*
         * Haber content i içerisinde ki  tag leri link haline dönüştürürken
         * update işlemlerinde tekrar üzerine yazıldığında mükerrer oluşturduğundan dolayı
         * sadece create işleminde bu işlemi yapıyoruz.
         * */
        $tagsRepo = new TagRepository();

        if(!isset($record->id)) {
            $findTagsInContent = Input::get('find_tags_in_content') == "on" ? true : false;

            if($findTagsInContent){
                foreach ($tagsRepo->findAll() as $tag){

                    $input['content'] = str_replace(
                        $tag->name,
                        '<a href="tags/' . $tag->name . '\">' . $tag->name . '</a>',
                        $input['content']
                    );
                }
            }
        }


//        if(empty($input['slug']) && $record->id > 0 ) {
//            $slug = SlugService::createSlug(News::class, 'slug', $input['title']);
//            $input['slug'] = $slug;
//        }else {
//            $input['slug'] = Str::slug($input['slug']);
//        }





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
            }

            if ($result[0]) {

                if(!empty($input['thumbnail'])) {
                    $oldPath = $record->thumbnail;
                    $document_name = $input['thumbnail']->getClientOriginalName();
                    $destination = '/images/news_images/'. $result[1]->id .'/thumbnail';
                    Uploader::fileUpload($result[1] , 'thumbnail', $input['thumbnail'] , $destination , $document_name);
                    Uploader::removeFile($oldPath);


                    Image::make(public_path('images/news_images/' . $result[1]->id .'/thumbnail/'. $result[1]->thumbnail))
                        ->fit(58, 58)
                        ->save(public_path('images/news_images/' . $result[1]->id . '/58x58_' . $document_name));

                    Image::make(public_path('images/news_images/' . $result[1]->id .'/thumbnail/'. $result[1]->thumbnail))
                        ->fit(165, 90)
                        ->save(public_path('images/news_images/' . $result[1]->id . '/165x90_' . $document_name));

                    Image::make(public_path('images/news_images/' . $result[1]->id .'/thumbnail/'. $result[1]->thumbnail))
                        ->fit(196, 150)
                        ->save(public_path('images/news_images/' . $result[1]->id . '/196x150_' . $document_name));

                    Image::make(public_path('images/news_images/' . $result[1]->id .'/thumbnail/'. $result[1]->thumbnail))
                        ->fit(220, 310)
                        ->save(public_path('images/news_images/' . $result[1]->id . '/220x310_' . $document_name));

                    Image::make(public_path('images/news_images/' . $result[1]->id .'/thumbnail/'. $result[1]->thumbnail))
                        ->fit(322, 265)
                        ->save(public_path('images/news_images/' . $result[1]->id . '/322x265_' . $document_name));

                    Image::make(public_path('images/news_images/' . $result[1]->id .'/thumbnail/'. $result[1]->thumbnail))
                        ->fit(497, 358)
                        ->save(public_path('images/news_images/' . $result[1]->id . '/497x358_' . $document_name));
                }

                if(!empty($input['cuff_photo'])) {
                    $oldPath = $record->cuff_photo;
                    $document_name = $input['cuff_photo']->getClientOriginalName();
                    $destination = '/images/news_images/'. $result[1]->id .'/cuff_photo' ;
                    Uploader::fileUpload($result[1] , 'cuff_photo', $input['cuff_photo'] , $destination , $document_name);
                    Uploader::removeFile($oldPath);
                }


                $this->news_news_categories_store($result[1],$input);
                $this->future_news_store($result[1],$input);
                $this->recommendation_news_store($result[1],$input);
                $this->related_news_news_store($result[1],$input);
                $this->tags_news_store($result[1],$input);
                $this->news_photo_galleries_store($result[1],$input);
                $this->news_video_galleries_store($result[1],$input);
                $this->news_videos_store($result[1],$input);
                $this->news_photos_store($result[1],$input);



                /*
                 * content içerisinde bulunan tag leri tag listesine otomatik olarak ekliyoruz
                 * setting tablosunda "automatic_add_tags" ayarının 1 olması gerekiyor.
                 *
                 * Buna göre form alanında checkbox işaretli gelince bu işlemi yapıyoruz.
                 *
                 * Önemli NOT : Kullanıcının  manuel olarak haberle ilişkilendirdiği tag ler "tags_news_store"
                 * methodunda "sync" olarak ekleniyor.BUndan dolayı biz "attach" olarak ekliyoruz.
                 *
                 * */

                $automaticAddTags = Input::get('automatic_add_tags') == "on" ? true : false;

                if($automaticAddTags){

                    foreach ($tagsRepo->findAll() as $tag){

                        if(strpos($input['content'], $tag->name)){

                            $isExistTag = $result[1]->tags->where('name',$tag->name)->first();

                            if(empty($isExistTag))
                                $result[1]->tags()->attach($tag->id);
                        }
                    }
                }

                Redis::flushall();
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


    public function news_news_categories_store(News $record, $input)
    {
        if(isset($input['news_category_ids'])) {
            $record->news_categories()->sync($input['news_category_ids']);
        }
    }

    public function future_news_store(News $record, $input)
    {
        $input['future_news__is_active'] = Input::get('future_news__is_active') == "on" ? true : false;

        if(empty($record)){

            return Redirect::back()
                ->withErrors(trans('common.save_failed'))
                ->withInput($input);
        }

        if(!empty($input['future_datetime'])){

            if(!empty($record->future_news)) {

                $futureNews = $record->future_news;
                $futureNews->future_datetime = $input['future_datetime'];
                $futureNews->is_active = $input['future_news__is_active'];
                $futureNews->save();

            }else {

                $record->future_news()->create([
                    'future_datetime'   => $input['future_datetime'],
                    'is_active'         => $input['future_news__is_active']
                ]);
            }

            Log::info('Future news updated by ' . Auth::user()->id);
            Session::flash('flash_message', trans('news::news.future_news_updated'));
        }

    }

    public function recommendation_news_store(News $record, $input)
    {

        if(empty($record)){

            return Redirect::back()
                ->withErrors(trans('common.save_failed'))
                ->withInput($input);
        }


        if(!empty($input['recommendation_news_order'])){

            $input['recommendation_news_is_active'] = Input::get('recommendation_news_is_active') == "on" ? true : false;
            $input['recommendation_news_is_cuff'] = Input::get('recommendation_news_is_cuff') == "on" ? true : false;

            if(!empty($record->recommendation_news)){

                $recommendation_news            = $record->recommendation_news;
                $recommendation_news->user_id   = Auth::user()->id;
                $recommendation_news->order     = $input['recommendation_news_order'];
                $recommendation_news->is_active = $input['recommendation_news_is_active'];
                $recommendation_news->is_cuff   = $input['recommendation_news_is_cuff'];
                $recommendation_news->save();

            }else {
                $record->recommendation_news()->create([
                    'user_id'   => Auth::user()->id,
                    'order'   => $input['recommendation_news_order'],
                    'is_active'   => $input['recommendation_news_is_active'],
                    'is_cuff'   => $input['recommendation_news_is_cuff'],
                ]);
            }


            Log::info('Recommendation  news updated by ' . Auth::user()->id);
            Session::flash('flash_message', trans('news::news.recommendation_news_updated'));
        }


    }

    public function related_news_news_store(News $record, $input)
    {
//        $record->related_news()->sync($input['related_news_ids']);

        if(isset($input['related_news_ids'])){

            RelatedNews::where('news_id',$record->id)->delete();

            foreach ($input['related_news_ids'] as $in){

                $relatedNews = new RelatedNews();
                $relatedNews->news_id = $record->id;
                $relatedNews->related_news_id =  $in;
                $relatedNews->save();
            }
        }
    }

    public function tags_news_store(News $record, $input)
    {
        if(isset($input['tags_ids'])) {
            $record->tags()->sync($input['tags_ids']);
        }
    }

    public function news_photo_galleries_store(News $record, $input)
    {
        if(isset($input['photo_gallery_ids'])) {
            $record->photo_galleries()->sync($input['photo_gallery_ids']);
        }
    }

    public function news_video_galleries_store(News $record, $input)
    {
        if(isset($input['video_gallery_ids'])) {
            $record->video_galleries()->sync($input['video_gallery_ids']);
        }
    }

    public function news_videos_store(News $record, $input)
    {
        if(isset($input['videos_ids'])) {
            $record->videos()->sync($input['videos_ids']);
        }
    }

    public function news_photos_store(News $record, $input)
    {
        if(isset($input['photos_ids'])) {
            $record->photos()->sync($input['photos_ids']);
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

    public function toggleBooleanType(int $news_id, string $key)
    {
        $value = null;
        $record = $this->repo->find($news_id);

        if($record->$key){
            $value =  0;
        }else
            $value = 1;

        $this->repo->update($record->id,[$key => $value]);

        return Redirect::back();
    }

    public function statusToggle(Request $regust)
    {
        $input = Input::all();

        if(empty($input['status'])){
            return Redirect::back()
                ->withErrors(trans('common.status_null'))
                ->withInput($input);
        }

        $value = null;
        $record = $this->repo->find($input['recordId']);

        $this->repo->update($record->id,['status' => $input['status']]);

        return Redirect::back();
    }

    public function showTrashedRecords()
    {
        $trashedRecords = News::onlyTrashed()->paginate(50);

        return Theme::view('news::' . $this->getViewName(__FUNCTION__),compact([
            'trashedRecords'
        ]));
    }

    public function trashedNewsRestore($trashedNewsId)
    {
        if(!is_numeric($trashedNewsId) || empty($trashedNewsId)){

            return Redirect::back()
                ->withErrors(trans('common.model_not_resorted'));
        }

        $news = $this->repo->withTrashed()->find($trashedNewsId);
        $news->restore();
        $this->repo->forgetCache();


        Session::flash('flash_message', trans('common.model_resorted'));
        return Redirect::back();
    }

    public function historyForceDelete()
    {
         $input = Input::all();

         if(empty($input['historyForceDeleteRecordId']) || !is_numeric($input['historyForceDeleteRecordId'])) {

             return Redirect::back()
                 ->withErrors(trans('common.save_failed'));
         }

        $news = $this->repo->withTrashed()->find($input['historyForceDeleteRecordId']);
        $news->forceDelete();

        Session::flash('flash_message', trans('common.force_deleted'));
        return redirect()->back();
    }


    public function forgetCache()
    {
        $this->repo->forgetCache();
        return Redirect::back();
    }


}
