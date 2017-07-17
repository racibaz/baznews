<?php

namespace App\Modules\News\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;
use App\Jobs\Ping\SendPing;
use App\Library\Link\LinkShortener;
use App\Library\Uploader;
use App\Models\City;
use App\Models\Country;
use App\Models\Setting;
use App\Models\Tag;
use App\Modules\News\Http\Requests\NewsRequest;
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
use Carbon\Carbon;
use Mremi\UrlShortener\Model\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class NewsController extends BackendController
{
    private $oldPath;

    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'news.';
        $this->redirectViewName = 'backend.';
        $this->repo = $repo;
    }

    public function index($statusCode = null)
    {
        $statusList = [];
        $newsCountByStatus = [];
        $statuses = News::$statuses;
        foreach ($statuses as $index => $status) {
            if (Auth::user()->can($status . '-news')) {
                $statusList[$index] = $status;
                $newsCountByStatus[$index] = $this->repo->where('status', $index)->findAll()->count();
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

        $newsCategoryList = NewsCategory::newsCategoryList();

        return Theme::view('news::' . $this->getViewName(__FUNCTION__), compact([
            'records',
            'newsCategoryList',
            'statusList',
            'newsCountByStatus',
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

        foreach ($statuses as $index => $status) {

            if (Auth::user()->can($status . '-news')) {
                $statusList[$index] = $status;
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


    public function store(NewsRequest $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(News $record)
    {
        $relatedNewsItems = $this->repo->relatedNews($record);

        return Theme::view('news::' . $this->getViewName(__FUNCTION__), compact([
            'record',
            'relatedNewsItems'
        ]));
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

        foreach ($record->tags as $index => $tag) {
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

        foreach ($statuses as $index => $status) {

            if (Auth::user()->can($status . '-news')) {
                $statusList[$index] = $status;
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


    public function update(NewsRequest $request, News $record)
    {
        return $this->save($record);
    }


    public function destroy(News $record)
    {
        $this->repo->delete($record->id);

        $this->removeCacheTags(['News']);
        $this->removeHomePageCache();

        return redirect()->route($this->redirectRouteName . $this->view . 'list');
    }


    /**
     * @param $record
     * @return $this|\Illuminate\Http\RedirectResponse
     */
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


        $ping = Input::get('is_ping') == "on" ? true : false;
        unset($input['is_ping']);


        /*
         * Haber content i içerisinde ki  tag leri link haline dönüştürürken
         * update işlemlerinde tekrar üzerine yazıldığında mükerrer oluşturduğundan dolayı
         * sadece create işleminde bu işlemi yapıyoruz.
         * */
        $tagsRepo = new TagRepository();

        if (!isset($record->id)) {
            $findTagsInContent = Input::get('find_tags_in_content') == "on" ? true : false;

            if ($findTagsInContent) {
                foreach ($tagsRepo->findAll() as $tag) {

                    $input['content'] = str_replace(
                        $tag->name,
                        '<a href="tags/' . $tag->name . '\">' . $tag->name . '</a>',
                        $input['content']
                    );
                }
            }
        }

        if (isset($record->id)) {
            $result = $this->repo->update($record->id, $input);
        } else {
            $result = $this->repo->create($input);
        }

        if ($result) {

            if (!empty($input['thumbnail'])) {

                $destination = '/images/news_images/' . $result->id . '/thumbnail';
                Uploader::removeDirectory($destination);

                $document_name = $input['thumbnail']->getClientOriginalName();
                Uploader::fileUpload($result, 'thumbnail', $input['thumbnail'], $destination, $document_name);

                $originalPhotoPath = public_path('images/news_images/' . $result->id . '/thumbnail/' . $result->thumbnail);

                Image::make($originalPhotoPath)
                    ->fit(58, 58)
                    ->save(public_path('images/news_images/' . $result->id . '/58x58_' . $document_name));

                Image::make($originalPhotoPath)
                    ->fit(165, 90)
                    ->save(public_path('images/news_images/' . $result->id . '/165x90_' . $document_name));

                Image::make($originalPhotoPath)
                    ->fit(196, 150)
                    ->save(public_path('images/news_images/' . $result->id . '/196x150_' . $document_name));

                Image::make($originalPhotoPath)
                    ->fit(220, 310)
                    ->save(public_path('images/news_images/' . $result->id . '/220x310_' . $document_name));

                Image::make($originalPhotoPath)
                    ->fit(322, 265)
                    ->save(public_path('images/news_images/' . $result->id . '/322x265_' . $document_name));

                Image::make($originalPhotoPath)
                    ->fit(497, 358)
                    ->save(public_path('images/news_images/' . $result->id . '/497x358_' . $document_name));
            }

            if (!empty($input['cuff_photo'])) {

                $destination = '/images/news_images/' . $result->id . '/cuff_photo';
                Uploader::removeDirectory($destination . '/');

                $document_name = $input['cuff_photo']->getClientOriginalName();
                Uploader::fileUpload($result, 'cuff_photo', $input['cuff_photo'], $destination, $document_name);
            }


            $this->newsNewsCategoriesStore($result, $input);
            $this->futureNewsStore($result, $input);
            $this->recommendationNewsStore($result, $input);
            $this->relatedNewsNewsStore($result, $input);
            $this->tagsNewsStore($result, $input);

            /*
             * news_type photo gallery tipi ise photo gallery silinmemeli
             * */
            $photoGalleriesStoreResult = $this->newsPhotoGalleriesStore($result, $input);
            if(!$photoGalleriesStoreResult){
                return Redirect::back()
                    ->withErrors(trans('news::news.news_relation_is_not_updated_with_news_type'))
                    ->withInput($input);
            }

            /*
             * news_type videp gallery tipi ise video gallery silinmemeli
             * */
            $videoGalleriesStoreResult = $this->newsVideoGalleriesStore($result, $input);
            if(!$videoGalleriesStoreResult){
                return Redirect::back()
                    ->withErrors(trans('news::news.news_relation_is_not_updated_with_news_type'))
                    ->withInput($input);
            }



            $this->newsVideosStore($result, $input);
            $this->newsPhotosStore($result, $input);


            /*
             * slug değişmiş ise ve link kısaltmaya izin verilmişse google link kısaltma servisi ile 'short_link' alanına ekliyoruz.
             *
             * */
            if (($record->slug != $result->slug) && Setting::where('attribute_key', 'is_url_shortener')->first()) {

                $linkShortener = new LinkShortener(new Link);
                $result->short_url = $linkShortener->linkShortener($result->slug);
                $result->save();
            }


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

            if ($automaticAddTags) {

                foreach ($tagsRepo->findAll() as $tag) {

                    if (strpos($input['content'], $tag->name)) {

                        $isExistTag = $result->tags->where('name', $tag->name)->first();

                        if (empty($isExistTag))
                            $result->tags()->attach($tag->id);
                    }
                }
            }

            $this->removeCacheTags(['News']);
            $this->removeHomePageCache();

            /*
             *Send a job for ping with delay 10 minutes
             * */
            if ($ping == true && $result->status == 1) {
                $pingJob = (new SendPing())
                    ->delay(Carbon::now()->addMinutes(10));

                dispatch($pingJob);
            }

            Session::flash('flash_message', trans('common.message_model_updated'));
            return Redirect::route($this->redirectRouteName . $this->view . 'list', $result);
        } else {
            return Redirect::back()
                ->withErrors(trans('common.save_failed'))
                ->withInput($input);
        }
    }


    public function newsNewsCategoriesStore(News $record, $input)
    {
        if (isset($input['news_category_ids'])) {
            $record->news_categories()->sync($input['news_category_ids']);
        }else{
            $record->news_categories()->detach();
        }
    }

    public function futureNewsStore(News $record, $input)
    {
        $input['future_news__is_active'] = Input::get('future_news__is_active') == "on" ? true : false;

        if (empty($record)) {

            return Redirect::back()
                ->withErrors(trans('common.save_failed'))
                ->withInput($input);
        }

        if (!empty($input['future_datetime'])) {

            if (!empty($record->future_news)) {

                $futureNews = $record->future_news;
                $futureNews->future_datetime = $input['future_datetime'];
                $futureNews->is_active = $input['future_news__is_active'];
                $futureNews->save();

            } else {

                $record->future_news()->create([
                    'future_datetime' => $input['future_datetime'],
                    'is_active' => $input['future_news__is_active']
                ]);
            }

            Log::info('Future news updated by ' . Auth::user()->id);
            Session::flash('flash_message', trans('news::news.future_news_updated'));
        }

    }

    public function recommendationNewsStore(News $record, $input)
    {

        if (empty($record)) {

            return Redirect::back()
                ->withErrors(trans('common.save_failed'))
                ->withInput($input);
        }


        if (!empty($input['recommendation_news_order'])) {

            $input['recommendation_news_is_active'] = Input::get('recommendation_news_is_active') == "on" ? true : false;
            $input['recommendation_news_is_cuff'] = Input::get('recommendation_news_is_cuff') == "on" ? true : false;

            if (!empty($record->recommendation_news)) {

                $recommendation_news = $record->recommendation_news;
                $recommendation_news->user_id = Auth::user()->id;
                $recommendation_news->order = $input['recommendation_news_order'];
                $recommendation_news->is_active = $input['recommendation_news_is_active'];
                $recommendation_news->is_cuff = $input['recommendation_news_is_cuff'];
                $recommendation_news->save();

            } else {
                $record->recommendation_news()->create([
                    'user_id' => Auth::user()->id,
                    'order' => $input['recommendation_news_order'],
                    'is_active' => $input['recommendation_news_is_active'],
                    'is_cuff' => $input['recommendation_news_is_cuff'],
                ]);
            }


            Log::info('Recommendation  news updated by ' . Auth::user()->id);
            Session::flash('flash_message', trans('news::news.recommendation_news_updated'));
        }


    }

    public function relatedNewsNewsStore(News $record, $input)
    {
//        $record->related_news()->sync($input['related_news_ids']);

        if (isset($input['related_news_ids'])) {

            RelatedNews::where('news_id', $record->id)->delete();

            foreach ($input['related_news_ids'] as $in) {

                $record->related_news()->create([
                    'related_news_id' => $in,
                ]);
            }
        }
    }

    public function tagsNewsStore(News $record, $input)
    {
        if (isset($input['tags_ids'])) {
            $record->tags()->sync($input['tags_ids']);
        }else{
            $record->tags()->detach();
        }
    }

    /**
     * @param News $record
     * @param $input
     * @return bool
     */
    public function newsPhotoGalleriesStore(News $record, $input)
    {
        if (isset($input['photo_gallery_ids'])) {
            $record->photo_galleries()->sync($input['photo_gallery_ids']);
        }else{
            if($record->news_type == 3){
                return false;
            }else{
                $record->photo_galleries()->detach();
            }
        }

        return true;
    }

    /**
     * @param News $record
     * @param $input
     * @return bool
     */
    public function newsVideoGalleriesStore(News $record, $input)
    {
        if (isset($input['video_gallery_ids'])) {
            $record->video_galleries()->sync($input['video_gallery_ids']);
        }else{

            if($record->news_type === 5){
                return false;
            }else{
                $record->video_galleries()->detach();
            }
        }

        return true;
    }

    public function newsVideosStore(News $record, $input)
    {
        if (isset($input['videos_ids'])) {
            $record->videos()->sync($input['videos_ids']);
        }else{
            $record->videos()->detach();
        }
    }

    public function newsPhotosStore(News $record, $input)
    {
        if (isset($input['photos_ids'])) {
            $record->photos()->sync($input['photos_ids']);
        }else{
            $record->photos()->detach();
        }
    }

    public function newsFilter(Request $request)
    {
        $records = News::
        whereHas('news_categories', function ($query) {
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
            ->orderBy('updated_at', 'desc');

        $newsCategoryList = NewsCategory::newsCategoryList();
        $records = $records->paginate(100);

        return Theme::view('news::' . $this->getViewName(__FUNCTION__), compact(['records', 'newsCategoryList']));
    }

    public function toggleBooleanType($news_id, $key)
    {
        $value = null;
        $record = $this->repo->find($news_id);

        if ($record->$key) {
            $value = 0;
        } else
            $value = 1;

        $this->repo->update($record->id, [$key => $value]);

        $this->removeCacheTags(['News']);
        $this->removeHomePageCache();

        return Redirect::back();
    }

    public function statusToggle(Request $regust)
    {
        $input = Input::all();

        if (empty($input['status'])) {
            return Redirect::back()
                ->withErrors(trans('common.status_null'))
                ->withInput($input);
        }

        $value = null;
        $record = $this->repo->find($input['recordId']);

        $this->repo->update($record->id, ['status' => $input['status']]);

        $this->removeCacheTags(['News']);
        $this->removeHomePageCache();

        return Redirect::back();
    }

    public function showTrashedRecords()
    {
        $trashedRecords = News::onlyTrashed()->paginate(50);

        return Theme::view('news::' . $this->getViewName(__FUNCTION__), compact([
            'trashedRecords'
        ]));
    }

    public function trashedNewsRestore($trashedNewsId)
    {
        if (!is_numeric($trashedNewsId) || empty($trashedNewsId)) {

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

        if (empty($input['historyForceDeleteRecordId']) || !is_numeric($input['historyForceDeleteRecordId'])) {

            return Redirect::back()
                ->withErrors(trans('common.save_failed'));
        }

        $news = $this->repo->withTrashed()->find($input['historyForceDeleteRecordId']);
        $news->forceDelete();

        Session::flash('flash_message', trans('common.force_deleted'));
        return redirect()->back();
    }
}
