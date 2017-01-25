<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Event;
use App\Models\Group;
use App\Models\Role;
use App\Repositories\UserRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    private $repo;
    private $view = 'user.';
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

        $input['status'] = Input::get('status') == "on" ? true : false;
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

                $result = $this->repo->update($record->id, $input);

            } else {
                $result = $this->repo->create($input);
            }
            if ($result[0]) {

                $this->role_user_store($result[1],$input);

                $this->group_user_store($result[1],$input);

                Session::flash('flash_message', trans('common.message_model_updated'));
                return Redirect::route($this->redirectRouteName . $this->view . 'index', $record);
            } else {
                return Redirect::back()
                    ->withErrors(trans('common.save_failed'))
                    ->withInput($input);
            }
        }
    }


    public function role_user_store(User $record, $input)
    {
        $record->roles()->sync($input['role_user_store_']);
    }


    public function group_user_store(User $record, $input)
    {
        $record->groups()->sync($input['group_user_store_']);
    }
}
