<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Repositories\RoleRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class RoleController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'role.';
        $this->redirectViewName = 'backend.';
        $this->repo= $repo;
    }


    public function index()
    {
        $records = $this->repo->paginate();
        return Theme::view($this->getViewName(__FUNCTION__),compact('records'));
    }


    public function create()
    {
        $perms = Permission::permissionList();
        $record = $this->repo->createModel();
        return Theme::view($this->getViewName(__FUNCTION__),compact(['record', 'perms']));
    }


    public function store(RoleRequest $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(Role $record)
    {
        return Theme::view($this->getViewName(__FUNCTION__),compact('record'));
    }


    public function edit(Role $record)
    {
        $perms = Permission::permissionList();
        return Theme::view($this->getViewName(__FUNCTION__),compact(['record', 'perms']));
    }


    public function update(RoleRequest $request, Role $record)
    {
        return $this->save($record);
    }


    public function destroy(Role $record)
    {
        $this->repo->delete($record->id);
        return redirect()->route($this->redirectRouteName . $this->view .'index');
    }


    public function save($record)
    {
        $input = Input::all();
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;

        if (isset($record->id)) {
            $result = $this->repo->update($record->id,$input);
        } else {
            $result = $this->repo->create($input);
        }

        if ($result) {

            $this->permissionRoleStore($result,$input);
            $this->removeCacheTags(['routeList']);

            Session::flash('flash_message', trans('common.message_model_updated'));
            return Redirect::route($this->redirectRouteName . $this->view . 'index', $result);
        } else {
            return Redirect::back()
                ->withErrors(trans('common.save_failed'))
                ->withInput($input);
        }
    }


    public function permissionRoleStore(Role $record, $input)
    {
        if(isset($input['permission_role_store_'])) {
            $record->permissions()->sync($input['permission_role_store_']);
        }
    }
}
