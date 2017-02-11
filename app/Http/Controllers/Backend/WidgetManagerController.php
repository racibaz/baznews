<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\WidgetGroup;
use App\Models\WidgetManager;
use App\Repositories\WidgetManagerRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class WidgetManagerController extends Controller
{
    private $repo;
    private $view = 'widget_manager.';
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
        $records = $this->repo->findAll();

        $moduleWidgets = WidgetManager::getEnableModuleWidgets();
        $coreWidgetss = WidgetManager::getCoreWidgets();
        $widgets = array_merge($coreWidgetss,$moduleWidgets);

//        dd($widgets);

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
                $result = $this->repo->update($record->id,$input);
            } else {
                $result = $this->repo->create($input);
            }
            if ($result[0]) {
                Session::flash('flash_message', trans('common.message_model_updated'));
                return Redirect::route($this->redirectRouteName . $this->view . 'index', $record);
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

        return Redirect::back();
    }

}
