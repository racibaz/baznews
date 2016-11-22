<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Jobs\BackUp\GetBackUp;
use App\Jobs\Cache\FlushAllCache;
use App\Jobs\DB\RepairMysqlTables;
use App\Models\Setting;
use App\Repositories\SettingRepository as Repo;
use Caffeinated\Modules\Facades\Module;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Route;

class SettingController extends Controller
{
    private $repo;
    private $view = 'setting.';
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
        $routeCollection = Route::getRoutes();
        $themes = Theme::all();
        $activeTheme = Theme::getActive();
        $modules = Module::all();
        $modulesCount = Module::count();

        $records = $this->repo->findAll();
        //$records = Setting::all();


        return Theme::view($this->getViewName(__FUNCTION__),compact('records', 'routeCollection', 'themes', 'activeTheme', 'modules', 'modulesCount'));
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

        $input['is_active'] = Input::get('is_active') == "on" ? true : false;
        
        $v = Setting::validate($input);

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


    public function repairMysqlTables()
    {
        $this->dispatch(new RepairMysqlTables());

        Log::info('Database table repaired.');
        Session::flash('flash_message', trans('setting.repair_mysql_tables'));

        return Redirect::back();
    }

    public function flushAllCache()
    {
        $this->dispatch(new FlushAllCache());

        Log::info('Caches deleted');
        Session::flash('flash_message', trans('setting.flush_all_cache'));
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
}
