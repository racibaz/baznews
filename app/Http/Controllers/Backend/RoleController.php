<?php

namespace App\Http\Controllers\Backend;

use App\Models\Permission;
use App\Models\Role;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\RoleRepository as Repo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class RoleController extends Controller
{
    private $repo;
    private $view = 'role.';
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
        return Theme::view($this->getViewName(__FUNCTION__),compact('records'));
    }


    public function create()
    {
        $perms = Permission::permissionList();
        $record = $this->repo->createModel();
        return Theme::view($this->getViewName(__FUNCTION__),compact(['record', 'perms']));
    }


    public function store(Request $request)
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


    public function update(Request $request, Role $record)
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

        $v = Role::validate($input);

        if ($v->fails()) {
            return Redirect::back()
                ->withErrors($v)
                ->withInput($input);
        } else {

            if (isset($record->id)) {
                $result = $this->repo->update($record->id, $input);
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


    public function permission_role_store(Request $request)
    {
        $input = Input::all();
        $role_id = $input['role_id'];

        unset($input['role_id']);
        unset($input['_token']);

        $role = Role::find($role_id);
        //$role->permissons->sync($input);

        $role->permissions()->sync($input);

        return Redirect::back();
    }


}
