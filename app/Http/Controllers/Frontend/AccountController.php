<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Event;
use App\Models\Group;
use App\Models\Role;
use App\Models\User;
use App\Repositories\UserRepository as UseRepo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class AccountController extends Controller
{
    private $repo;
    private $view = 'account.';
    private $redirectViewName = 'frontend.';
    private $redirectRouteName = '';

    public function __construct(UseRepo $repo)
    {
        $this->repo= $repo;
    }

    public function getViewName($methodName)
    {
        return $this->redirectViewName . $this->view . $methodName;
    }


    public function index()
    {
        $record = $this->repo->find(\Auth::user()->id);
        return Theme::view($this->getViewName(__FUNCTION__),compact('record'));
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

    public function save($record)
    {
        $input = Input::all();

        $input['status'] = Input::get('status') == "on" ? true : false;
        $input['sex'] = Input::get('sex') == "on" ? true : false;

        //kullanıcı email adresini guncellediğinde email adresini uniqe olduğu için
        //kendi email adresini daha önce kayıtlı olarak görüyor ve hata veriyor
        //bundan dolayı aynı ise burada unique validasyonunu atlamış oluyoruz.
        $rules = [
            'first_name'                    => 'required|max:255',
            'last_name'                     => 'required|max:255',
            'email'                         => $input['email'] == $record['email'] ?  'Required|Between:3,64|email' : 'required|string|Between:3,64|Unique:users',
            'password'                      => isset($record->id)  ?   'min:4|Confirmed' : 'required|min:4|Confirmed',
            'password_confirmation'         => isset($record->id)  ? 'min:4' : 'required|min:4',
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
}
