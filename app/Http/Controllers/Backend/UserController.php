<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Event;
use App\Models\Group;
use App\Models\Role;
use App\Models\User;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository as Repo;
use Auth;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class UserController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'user.';
        $this->redirectViewName = 'backend.';
        $this->repo= $repo;
    }


    public function index($roleId = null)
    {
        $roleRepo = new RoleRepository();
        $roles = $roleRepo->where('is_active',1)->findAll();

        /*
         * List by user roles
         * */
        if(is_numeric($roleId)) {
            $records = $roleRepo
                ->find($roleId)
                ->users;
        }else{
            $records = $this->repo->findAll();
        }

        return Theme::view($this->getViewName(__FUNCTION__),compact('records', 'roles'));
    }


    public function create()
    {
        $statusList = [];

        $record = $this->repo->createModel();
        $countries = Country::countryList();
        $cities = City::cityList();
        $roles = Role::roleList();
        $groups = Group::groupList();

        foreach (User::$statuses as  $index => $status){
            if(Auth::user()->can($status . '-user')){
                $statusList[$index] =  $status;
            }
        }

        return Theme::view($this->getViewName(__FUNCTION__),compact(['record','countries' ,'cities', 'roles', 'groups', 'statusList']));
    }


    public function store(UserRequest $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(User $record)
    {
        $revisions = $record->getUserRevisions($record->id);
        $events = Event::where('user_id',$record->id)->orderBy('updated_at', 'desc')->get();

        return Theme::view($this->getViewName(__FUNCTION__),compact('record', 'revisions', 'events'));
    }


    public function edit(User $record)
    {
        $statusList = [];

        $countries = Country::countryList();
        $cities = City::cityList();
        $roles = Role::roleList();
        $groups = Group::groupList();

        foreach (User::$statuses as  $index => $status){
            if(Auth::user()->can($status . '-user')){
                $statusList[$index] =  $status;
            }
        }

        return Theme::view($this->getViewName(__FUNCTION__),compact(['record','countries' ,'cities', 'roles', 'groups', 'statusList']));
    }


    public function update(UserRequest $request, User $record)
    {
        return $this->save($record);
    }


    public function destroy(User $record)
    {
        $this->repo->delete($record->id);

        return redirect()->route($this->redirectRouteName . $this->view .'index');
    }


    public function save($record)
    {
        $input = Input::all();

        $input['is_active'] = Input::get('is_active') == "on" ? true : false;
        $input['sex'] = Input::get('sex') == "on" ? true : false;


        if (isset($record->id)) {
            $input['password'] = !empty($input['password']) ? bcrypt($input['password']) : $record->password;
            $result = $this->repo->update($record->id, $input);
        } else {
            $result = $this->repo->create($input);
        }
        if ($result) {

            $this->roleUserStore($result,$input);
            $this->groupUserStore($result,$input);

            Session::flash('flash_message', trans('common.message_model_updated'));
            return Redirect::route($this->redirectRouteName . $this->view . 'index', $result);
        } else {
            return Redirect::back()
                ->withErrors(trans('common.save_failed'))
                ->withInput($input);
        }
    }


    public function roleUserStore(User $record, $input)
    {
        if(isset($input['role_user_store_']))
            $record->roles()->sync($input['role_user_store_']);
    }

    public function groupUserStore(User $record, $input)
    {
        if(isset($input['group_user_store_']))
            $record->groups()->sync($input['group_user_store_']);
    }


    public function showTrashedRecords()
    {
        $trashedRecords = User::onlyTrashed()->paginate(50);

        return Theme::view($this->getViewName(__FUNCTION__),compact(
            'trashedRecords'
        ));

    }

    public function trashedUserRestore($trashedUserId)
    {
        if(!is_numeric($trashedUserId) || empty($trashedUserId)){

            return Redirect::back()
                ->withErrors(trans('common.model_not_resorted'));
        }

        $news = $this->repo->withTrashed()->find($trashedUserId);
        $news->restore();
        $this->repo->forgetCache();

        Session::flash('flash_message', trans('common.model_resorted'));
        return Redirect::back();
    }

    public function historyForceDelete()
    {
        $input = Input::all();

        if(empty($input['historyForceDeleteRecordId']) || !is_numeric($input['historyForceDeleteRecordId'])) {

            return Redirect::back()
                ->withErrors(trans('common.save_failed'));
        }

        $user = $this->repo->withTrashed()->find($input['historyForceDeleteRecordId']);
        $user->forceDelete();

        Session::flash('flash_message', trans('common.force_deleted'));
        return redirect()->back();
    }



}
