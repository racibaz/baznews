<?php

namespace App\Http\Controllers\Backend;

use App\Models\WidgetGroup;
use App\Repositories\WidgetGroupRepository as Repo;
use Redirect;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class WidgetGroupController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'widget_group.';
        $this->redirectViewName = 'backend.';
        $this->repo = $repo;
    }


    public function index()
    {
        $records = $this->repo->orderBy('created_at','desc')->paginate();

        return view($this->getViewName(__FUNCTION__), compact('records'));
    }


    public function create()
    {
        $record = $this->repo->createModel();

        return view($this->getViewName(__FUNCTION__), compact(['record']));
    }


    public function store(Request $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(WidgetGroup $record)
    {
        return view($this->getViewName(__FUNCTION__), compact('record'));
    }


    public function edit(WidgetGroup $record)
    {
        return view($this->getViewName(__FUNCTION__), compact(['record']));
    }


    public function update(Request $request, WidgetGroup $record)
    {
        return $this->save($record);
    }


    public function destroy(WidgetGroup $record)
    {
        $this->repo->delete($record->id);
        return redirect()->route($this->redirectRouteName . $this->view . 'index');
    }


    public function save($record)
    {
        $input = Input::all();
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;

        $v = WidgetGroup::validate($input);

        if ($v->fails()) {
            return Redirect::back()
                ->withErrors($v)
                ->withInput($input);
        } else {

            if (isset($record->id)) {
                $result = $this->repo->update($record->id, $input);
            } else {
                $result = $this->repo->create($input);
            }

            if ($result) {
                Session::flash('flash_message', trans('common.message_model_updated'));
                return Redirect::route($this->redirectRouteName . $this->view . 'index', $result);
            } else {
                return Redirect::back()
                    ->withErrors(trans('common.save_failed'))
                    ->withInput($input);
            }
        }
    }
}
