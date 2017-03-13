<?php

namespace App\Http\Controllers\Backend;

use App\Models\ModuleManager;
use App\Repositories\ModuleManagerRepository as Repo;
use Cache;
use Caffeinated\Modules\Facades\Module;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;


class ModuleManagerController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'module_manager.';
        $this->redirectViewName = 'backend.';
        $this->repo= $repo;
    }

    public function index()
    {
        $modules = Module::all();
        $moduleCount = Module::count();

        $records = $this->repo->findAll();
        return Theme::view($this->getViewName(__FUNCTION__),compact(
            'records',
            'moduleCount',
            'modules'
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


    public function show(ModuleManager $record)
    {
        return Theme::view($this->getViewName(__FUNCTION__),compact('record'));
    }


    public function edit(ModuleManager $record)
    {
        return Theme::view($this->getViewName(__FUNCTION__),compact(['record']));
    }


    public function update(Request $request, ModuleManager $record)
    {
        return $this->save($record);
    }


    public function destroy(ModuleManager $record)
    {
        $this->repo->delete($record->id);
        return redirect()->route($this->redirectRouteName . $this->view .'index');
    }


    public function save($record)
    {
        $input = Input::all();
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;

        $v = ModuleManager::validate($input);

        if ($v->fails()) {
            return Redirect::back()
                ->withErrors($v)
                ->withInput($input);
        } else {

            if (isset($record->id)) {
                list($status, $instance) = $this->repo->update($record->id,$input);
            } else {
                list($status, $instance) = $this->repo->create($input);
            }

            if ($status) {
                Session::flash('flash_message', trans('common.message_model_updated'));
                return Redirect::route($this->redirectRouteName . $this->view . 'index', $status);
            } else {
                return Redirect::back()
                    ->withErrors(trans('common.save_failed'))
                    ->withInput($input);
            }
        }
    }

    public function moduleActivationToggle($moduleSlug)
    {
        if (Module::isEnabled($moduleSlug) )  {
            Module::disable($moduleSlug);

        }else{
            Module::enable($moduleSlug);
        }

        //Route Listesi cache lerini siliyoruz.
        Cache::tags('routeList')->flush();

        return Redirect::back();
    }


    public function moduleReset($moduleSlug)
    {
        Artisan::call('module:migrate:reset', [
            'slug' => $moduleSlug,
            '--force' => true,
        ]);

        $this->moduleActivationToggle($moduleSlug);

        return Redirect::back();
    }


    public function moduleRefreshAndSeed($moduleSlug)
    {
        Artisan::call('module:migrate', [
            'slug' => $moduleSlug,
            '--force' => true,
        ]);

        Artisan::call('module:seed', [
            'slug' => $moduleSlug,
            '--force' => true,
        ]);

        $this->moduleActivationToggle($moduleSlug);

        return Redirect::back();
    }





}
