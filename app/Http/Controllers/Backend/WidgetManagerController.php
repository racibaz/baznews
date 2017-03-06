<?php

namespace App\Http\Controllers\Backend;

use App\Models\WidgetManager;
use App\Repositories\WidgetManagerRepository as Repo;
use Cache;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class WidgetManagerController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'widget_manager.';
        $this->redirectViewName = 'backend.';
        $this->repo= $repo;
    }


    public function index()
    {
        $records = $this->repo->findAll();

        $moduleWidgets = WidgetManager::getEnableModuleWidgets();
        $coreWidgetss = WidgetManager::getCoreWidgets();
        $widgets = array_merge($coreWidgetss,$moduleWidgets);
        $widgetGroupList = WidgetManager::$widgetGroups;

        return Theme::view($this->getViewName(__FUNCTION__),compact('records', 'widgets','widgetGroupList' ));
    }


    public function create()
    {
        $record = $this->repo->createModel();
//        $widgetGroupList = WidgetGroup::widgetGroupList();
        $widgetGroupList = WidgetManager::$widgetGroups;
        return Theme::view($this->getViewName(__FUNCTION__),compact(['record', 'widgetGroupList']));
    }


    public function store(Request $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(WidgetManager $record)
    {
        return Theme::view($this->getViewName(__FUNCTION__),compact('record'));
    }


    public function edit(WidgetManager $record)
    {
//        $widgetGroupList = WidgetGroup::widgetGroupList();
        $widgetGroupList = WidgetManager::$widgetGroups;
        return Theme::view($this->getViewName(__FUNCTION__),compact(['record', 'widgetGroupList']));
    }


    public function update(Request $request, WidgetManager $record)
    {
        return $this->save($record);
    }


    public function destroy(WidgetManager $record)
    {
        $this->repo->delete($record->id);
        return redirect()->route($this->redirectRouteName . $this->view .'index');
    }


    public function save($record)
    {
        $input = Input::all();
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;

        $v = WidgetManager::validate($input);

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
                return Redirect::route($this->redirectRouteName . $this->view . 'index', $instance);
            } else {
                return Redirect::back()
                    ->withErrors(trans('common.save_failed'))
                    ->withInput($input);
            }
        }
    }


    public function addWidgetActivation(Request $request)
    {
        $index = Input::all();
        $widgetSlug = $index['widgetSlug'];
        $group = $index['group'];

        $widget = WidgetManager::getWidgetInfo($widgetSlug);

        $trashedWidget = $this->repo->withTrashed()->where('slug',$widgetSlug)->first();
        if(!empty($trashedWidget)){
            $trashedWidget->restore();
            $this->repo->forgetCache();
            return Redirect::back();
        }


        /*
         * sıralamaları position a göre yaptığımız için en son eklenen
         *
         * widget ın position değerini 1 arttırarak ekliyoruz.
         * */
        $widgetPosition = $this->repo->orderBy('position','desc')->findAll()->first();


        $widgetManagaer =[];
//        $widgetManagaer['widget_group_id']  = 4;
        $widgetManagaer['name']         = $widget['name'];
        $widgetManagaer['slug']         = $widget['slug'];
        $widgetManagaer['namespace']    = $widget['namespace'];
        $widgetManagaer['group']        = $group;
        $widgetManagaer['position']     = $widgetPosition->position + 1;
        $widgetManagaer['is_active']    = 1;

        $record = $this->repo->findBy('slug',$widgetSlug);

        if(isset($record->id)) {
            return Redirect::back()
                ->withErrors(trans('widget.widget_is_exists'));
        }else{
            $this->repo->create($widgetManagaer);
        }

        Cache::tags('homePage')->flush();
        return Redirect::back();
    }

}
