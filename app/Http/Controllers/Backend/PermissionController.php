<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use App\Repositories\PermissionRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class PermissionController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'permission.';
        $this->redirectViewName = 'backend.';
        $this->repo = $repo;
    }


    public function index()
    {
        $records = $this->repo->paginate();
        return Theme::view($this->getViewName(__FUNCTION__), compact('records'));
    }


    public function create()
    {
        $record = $this->repo->createModel();
        return Theme::view($this->getViewName(__FUNCTION__), compact(['record']));
    }


    public function store(PermissionRequest $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(Permission $record)
    {
        return Theme::view($this->getViewName(__FUNCTION__), compact('record'));
    }


    public function edit(Permission $record)
    {
        return Theme::view($this->getViewName(__FUNCTION__), compact(['record']));
    }


    public function update(PermissionRequest $request, Permission $record)
    {
        return $this->save($record);
    }


    public function destroy(Permission $record)
    {
        $this->repo->delete($record->id);
        return redirect()->route($this->redirectRouteName . $this->view . 'index');
    }


    public function save($record)
    {
        $input = Input::all();
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;

        if (isset($record->id)) {
            $result = $this->repo->update($record->id, $input);
        } else {
            $result = $this->repo->create($input);
        }

        if ($result) {

            $this->removeCacheTags(['routeList']);

            Session::flash('flash_message', trans('common.message_model_updated'));
            return Redirect::route($this->redirectRouteName . $this->view . 'index', $result);
        } else {
            return Redirect::back()
                ->withErrors(trans('common.save_failed'))
                ->withInput($input);
        }
    }
}
