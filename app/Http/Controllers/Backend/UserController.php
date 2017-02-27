<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Event;
use App\Models\Group;
use App\Models\Role;
use App\Models\User;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository as Repo;
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
         * Kullanıcıları gelen role değerine göre listeliyoruz.
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
        $record = $this->repo->createModel();
        $countries = Country::countryList();
        $cities = City::cityList();
        $roles = Role::roleList();
        $groups = Group::groupList();

        return Theme::view($this->getViewName(__FUNCTION__),compact(['record','countries' ,'cities', 'roles', 'groups']));
    }


    public function store(Request $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(User $record)
    {
        $revisions = $record->getUserRevisions($record->id);
        //$events = $record->events();
        $events = Event::where('user_id',$record->id)->get();

        return Theme::view($this->getViewName(__FUNCTION__),compact('record', 'revisions', 'events'));
    }


    public function edit(User $record)
    {
        $countries = Country::countryList();
        $cities = City::cityList();
        $roles = Role::roleList();
        $groups = Group::groupList();

        return Theme::view($this->getViewName(__FUNCTION__),compact(['record','countries' ,'cities', 'roles', 'groups']));
    }


    public function update(Request $request, User $record)
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

        //kullanıcı email adresini guncellediğinde email adresini uniqe olduğu için
        //kendi email adresini daha önce kayıtlı olarak görüyor ve hata veriyor
        //bundan dolayı aynı ise burada unique validasyonunu atlamış oluyoruz.
        $rules = [
            'name'                          => 'required|max:255',
            'email'                         => $input['email'] == $record['email'] ?  'Required|Between:3,64|email' : 'required|string|Between:3,64|Unique:users',
            'password'                      => isset($record->id)  ?   'min:4|Confirmed' : 'required|min:4|Confirmed',
            'password_confirmation'         => isset($record->id)  ? 'min:4' : 'required|min:4',
            'web_site'  => 'url',
            'avatar' => 'image|max:255',
            'bio_note'  => 'string|max:255',
        ];

        $v = Validator::make($input, $rules);


        if ($v->fails()) {
            return Redirect::back()
                ->withErrors($v)
                ->withInput($input);
        } else {

            if (isset($record->id)) {
                $input['password'] = !empty($input['password']) ? bcrypt($input['password']) : $record->password;
                list($status, $instance) = $this->repo->update($record->id, $input);
            } else {
                list($status, $instance) = $this->repo->create($input);
            }
            if ($status) {

                $this->roleUserStore($instance,$input);
                $this->groupUserStore($instance,$input);

                Session::flash('flash_message', trans('common.message_model_updated'));
                return Redirect::route($this->redirectRouteName . $this->view . 'index', $instance);
            } else {
                return Redirect::back()
                    ->withErrors(trans('common.save_failed'))
                    ->withInput($input);
            }
        }
    }


    public function roleUserStore(User $record, $input)
    {
        $record->roles()->sync($input['role_user_store_']);
    }

    public function groupUserStore(User $record, $input)
    {
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
