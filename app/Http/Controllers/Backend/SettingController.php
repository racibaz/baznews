<?php

namespace App\Http\Controllers\Backend;

use App\Jobs\BackUp\BackUpClean;
use App\Jobs\BackUp\GetBackUp;
use App\Jobs\DB\RepairMysqlTables;
use App\Library\Uploader;
use App\Models\City;
use App\Models\Country;
use App\Models\Language;
use App\Models\Setting;
use App\Repositories\SettingRepository as Repo;
use Caffeinated\Modules\Facades\Module;
use Caffeinated\Themes\Facades\Theme;
use DateTimeZone;
use Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class SettingController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'setting.';
        $this->redirectViewName = 'backend.';
        $this->repo= $repo;
    }

    public function index()
    {
        /*
         * todo Route::getRoutes() methodunu kullanarak
         * https://github.com/garygreen/pretty-routes
         * gibi özellikler kayılabilinir.
         */

        $timezoneList = [];
        $records = $this->repo->findAll();
        $languageList = Language::languageList();
        $countryList = Country::countryList();
        $cityList = City::cityList();
        $routeCollection = Route::getRoutes();
        $themes = Theme::all();
        $activeTheme = Theme::getActive();
        $modules = Module::all();
        $modulesCount = Module::count();

        //SelectBox içerisinde value değerinin seçilebilmesi için key yerine value değerini atıyoruz.
        foreach(DateTimeZone::listIdentifiers() as $key => $value) $timezoneList[$value] = $value;

        $logo = $this->repo->findBy('attribute_key','logo');

        return Theme::view($this->getViewName(__FUNCTION__),
            compact(
                'records',
                'languageList',
                'countryList',
                'cityList',
                'routeCollection',
                'themes',
                'activeTheme',
                'modules',
                'modulesCount',
                'timezoneList',
                'logo'
            ));
    }


    public function create()
    {
        $record = $this->repo->createModel();
        return Theme::view($this->getViewName(__FUNCTION__),compact(['record']));
    }


    public function store(Request $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(Setting $record)
    {
        return Theme::view($this->getViewName(__FUNCTION__),compact('record'));
    }


    public function edit(Setting $record)
    {
        return Theme::view($this->getViewName(__FUNCTION__),compact(['record','routeCollection']));
    }


    public function update(Request $request, Setting $record)
    {
        return $this->save($record);
    }


    public function destroy(Setting $record)
    {
        $this->repo->delete($record->id);
        return redirect()->route($this->redirectRouteName . $this->view .'index');
    }


    public function save($record)
    {
        $input = Input::all();

        $v = Setting::validate($input);

        if ($v->fails()) {
            return Redirect::back()
                ->withErrors($v)
                ->withInput($input);
        }

        if(!empty($input['country'])){
            $record = $this->repo->findBy('attribute_key', 'country');
            $this->repo->update($record->id,['attribute_value' => $input['country']]);
        }

        if(!empty($input['city'])){
            $record = $this->repo->findBy('attribute_key', 'city');
            $this->repo->update($record->id,['attribute_value' => $input['city']]);
        }

        if(!empty($input['language_code'])){
            $record = $this->repo->findBy('attribute_key', 'language_code');
            $this->repo->update($record->id,['attribute_value' => $input['language_code']]);
        }

        if(!empty($input['title'])){
            $record = $this->repo->findBy('attribute_key', 'title');
            $this->repo->update($record->id,['attribute_value' => $input['title']]);
        }

        if(!empty($input['slogan'])){
            $record = $this->repo->findBy('attribute_key', 'slogan');
            $this->repo->update($record->id,['attribute_value' => $input['slogan']]);
        }

        if(!empty($input['description'])){
            $record = $this->repo->findBy('attribute_key', 'description');
            $this->repo->update($record->id,['attribute_value' => $input['description']]);
        }

        if(!empty($input['keywords'])){
            $record = $this->repo->findBy('attribute_key', 'keywords');
            $this->repo->update($record->id,['attribute_value' => $input['keywords']]);
        }

        if(!empty($input['logo'])){
            Uploader::logoUploader($input['logo']);
        }

        if(!empty($input['abstract_text'])){
            $record = $this->repo->findBy('attribute_key', 'abstract_text');
            $this->repo->update($record->id,['attribute_value' => $input['abstract_text']]);
        }

        if(!empty($input['footer_text'])){
            $record = $this->repo->findBy('attribute_key', 'footer_text');
            $this->repo->update($record->id,['attribute_value' => $input['footer_text']]);
        }

        if(!empty($input['contact'])){
            $record = $this->repo->findBy('attribute_key', 'contact');
            $this->repo->update($record->id,['attribute_value' => $input['contact']]);
        }

        if(!empty($input['copyright'])){
            $record = $this->repo->findBy('attribute_key', 'copyright');
            $this->repo->update($record->id,['attribute_value' => $input['copyright']]);
        }

        if(!empty($input['url'])){
            $record = $this->repo->findBy('attribute_key', 'url');
            $this->repo->update($record->id,['attribute_value' => $input['url']]);
        }

        if(!empty($input['google_recaptcha_site_key'])){
            $record = $this->repo->findBy('attribute_key', 'google_recaptcha_site_key');
            $this->repo->update($record->id,['attribute_value' => $input['google_recaptcha_site_key']]);
        }

        if(!empty($input['google_recaptcha_secret_key'])){
            $record = $this->repo->findBy('attribute_key', 'google_recaptcha_secret_key');
            $this->repo->update($record->id,['attribute_value' => $input['google_recaptcha_secret_key']]);
        }

        if(!empty($input['google_url_shortener_key'])){
            $record = $this->repo->findBy('attribute_key', 'google_url_shortener_key');
            $this->repo->update($record->id,['attribute_value' => $input['google_url_shortener_key']]);
        }

        if(!empty($input['head_code'])){
            $record = $this->repo->findBy('attribute_key', 'head_code');
            $this->repo->update($record->id,['attribute_value' => $input['head_code']]);
        }

        if(!empty($input['footer_code'])){
            $record = $this->repo->findBy('attribute_key', 'footer_code');
            $this->repo->update($record->id,['attribute_value' => $input['footer_code']]);
        }

        if(!empty($input['timezone'])){
            $record = $this->repo->findBy('attribute_key', 'timezone');
            $this->repo->update($record->id,['attribute_value' => $input['timezone']]);
        }

        if(!empty($input['facebook'])){
            $record = $this->repo->findBy('attribute_key', 'facebook');
            $this->repo->update($record->id,['attribute_value' => $input['facebook']]);
        }

        if(!empty($input['facebook_embed_code'])){
            $record = $this->repo->findBy('attribute_key', 'facebook_embed_code');
            $this->repo->update($record->id,['attribute_value' => $input['facebook_embed_code']]);
        }

        if(!empty($input['twitter'])){
            $record = $this->repo->findBy('attribute_key', 'twitter');
            $this->repo->update($record->id,['attribute_value' => $input['twitter']]);
        }

        if(!empty($input['twitter_embed_code'])){
            $record = $this->repo->findBy('attribute_key', 'twitter_embed_code');
            $this->repo->update($record->id,['attribute_value' => $input['twitter_embed_code']]);
        }

        if(!empty($input['instagram'])){
            $record = $this->repo->findBy('attribute_key', 'instagram');
            $this->repo->update($record->id,['attribute_value' => $input['instagram']]);
        }

        if(!empty($input['instagram_embed_code'])){
            $record = $this->repo->findBy('attribute_key', 'instagram_embed_code');
            $this->repo->update($record->id,['attribute_value' => $input['instagram_embed_code']]);
        }

        if(!empty($input['pinterest'])){
            $record = $this->repo->findBy('attribute_key', 'pinterest');
            $this->repo->update($record->id,['attribute_value' => $input['pinterest']]);
        }

        if(!empty($input['pinterest_embed_code'])){
            $record = $this->repo->findBy('attribute_key', 'pinterest_embed_code');
            $this->repo->update($record->id,['attribute_value' => $input['pinterest_embed_code']]);
        }

        if(!empty($input['weather_embed_code'])){
            $record = $this->repo->findBy('attribute_key', 'weather_embed_code');
            $this->repo->update($record->id,['attribute_value' => $input['weather_embed_code']]);
        }

        if(!empty($input['addthis'])){
            $record = $this->repo->findBy('attribute_key', 'addthis');
            $this->repo->update($record->id,['attribute_value' => $input['addthis']]);
        }

        if(!empty($input['disqus'])){
            $record = $this->repo->findBy('attribute_key', 'disqus');
            $this->repo->update($record->id,['attribute_value' => $input['disqus']]);
        }

        if(!empty($input['rss_count'])){
            $record = $this->repo->findBy('attribute_key', 'rss_count');
            $this->repo->update($record->id,['attribute_value' => $input['rss_count']]);
        }

        if(!empty($input['rss_cache_life_time'])){
            $record = $this->repo->findBy('attribute_key', 'rss_cache_life_time');
            $this->repo->update($record->id,['attribute_value' => $input['rss_cache_life_time']]);
        }

        if(!empty($input['sitemap_count'])){
            $record = $this->repo->findBy('attribute_key', 'sitemap_count');
            $this->repo->update($record->id,['attribute_value' => $input['sitemap_count']]);
        }

        if(!empty($input['allow_photo_formats'])){
            $record = $this->repo->findBy('attribute_key', 'allow_photo_formats');
            $this->repo->update($record->id,['attribute_value' => $input['allow_photo_formats']]);
        }

        if(!empty($input['allow_video_formats'])){
            $record = $this->repo->findBy('attribute_key', 'allow_video_formats');
            $this->repo->update($record->id,['attribute_value' => $input['allow_video_formats']]);
        }

        Session::flash('flash_message', trans('common.message_model_updated'));
        return Redirect::route($this->redirectRouteName . $this->view . 'index');
    }


    public function repairMysqlTables()
    {
        $this->dispatch(new RepairMysqlTables());

        Log::info('Database table repaired.');
        Session::flash('flash_message', trans('setting.repair_mysql_tables'));

        return Redirect::back();
    }


    public function flushAllCache()
    {
//        $this->dispatch(new FlushAllCache());

        //tüm cache leri siliyoruz
        Redis::flushall();

        Log::info('Caches deleted');
        Session::flash('flash_message', trans('setting.flush_all_cache'));
        return Redirect::back();
    }

    public function flushCacheItem($cacheItem)
    {
        $this->removeCacheKey($cacheItem);
        Log::info('Caches deleted');
        Session::flash('flash_message', trans('setting.flush_cache_item') . '   ' . $cacheItem);
        return Redirect::back();
    }


    public function getAllRedisKey()
    {
         $redisKeys = Redis::keys('*');

        return Theme::view($this->getViewName(__FUNCTION__),compact(['redisKeys']));
    }


    public function deleteCacheByContent($content)
    {
        $laravelCaches = Redis::keys('*' . $content . '*');

        foreach ($laravelCaches as $laravelCache)
        {
            Redis::del($laravelCache);
        }
    }


    public function getBackUp()
    {
        $this->dispatch( new GetBackUp());

        Log::info('Backup received.');
        Session::flash('flash_message', trans('setting.backup_received'));

        return Redirect::back();
    }


    public function backUpClean()
    {
        $this->dispatch( new BackUpClean());

        Log::info('Backup cleaned.');
        Session::flash('flash_message', trans('setting.backup_cleaned'));

        return Redirect::back();
    }


    /**
     *
     * route:cache işlemi yapıldığında bu hatayı alıyoruz.
     * Unable to prepare route [laravel-filemanager/demo] for serialization. Uses Closure.
     *
     * Route lar da clouse yapı kullanıldığı için
     * https://github.com/laravel/framework/issues/7319#issuecomment-73362932
     *
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function routeCache()
    {
        \Artisan::call('route:cache');

        Log::info(trans('setting.route_cached'));
        Session::flash('flash_message', trans('setting.route_cached'));

        return Redirect::back();
    }


    public function routeClear()
    {
        \Artisan::call('route:clear');

        Log::info(trans('setting.route_cleared'));
        Session::flash('flash_message', trans('setting.route_cleared'));

        return Redirect::back();
    }


    public function viewClear()
    {
        \Artisan::call('view:clear');

        Log::info(trans('setting.view_cleared'));
        Session::flash('flash_message', trans('setting.view_cleared'));

        return Redirect::back();
    }


    public function configClear()
    {
        \Artisan::call('config:clear');

        Log::info(trans('setting.config_cleared'));
        Session::flash('flash_message', trans('setting.config_cleared'));

        return Redirect::back();
    }


    public function configCache()
    {
        \Artisan::call('config:cache');

        Log::info(trans('setting.config_cache'));
        Session::flash('flash_message', trans('setting.config_cache'));

        return Redirect::back();
    }
}
