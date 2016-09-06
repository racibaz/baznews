<?php

namespace App\Http\Controllers\Backend;

use App\Events\ModelCRUD;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Repositories\UserRepository as UserREpo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{

    private $model;
    private $view = 'user.';
    private $redirectViewName = 'backend.';
    private $redirectRouteName = '';

    public function __construct(UserREpo $model)
    {
        $this->model= $model;
    }

    public function getViewName($methodName)
    {
        return $this->redirectViewName . $this->view . $methodName;
    }


    public function index()
    {
        $records = $this->model->all();
        return Theme::view($this->getViewName(__FUNCTION__),compact('records'));
    }


    public function create()
    {
        $record = new User();
        return Theme::view($this->getViewName(__FUNCTION__),compact('record'));
    }


    public function store(Request $request)
    {
        return $this->save(new User());
    }


    public function show(User $record)
    {
        return Theme::view($this->getViewName(__FUNCTION__),compact('record'));
    }


    public function edit(User $record)
    {
        $countries = Country::countryList();
        $cities = City::cityList();
        return Theme::view($this->getViewName(__FUNCTION__),compact(['record','countries' ,'cities']));
    }


    public function update(Request $request, User $record)
    {
        return $this->save($record);
    }


    public function destroy(User $record)
    {

        $this->model->delete($record->id);

//        $this->model->delete($record->id);
//        Session::flash('flash_message', trans('common.message_model_deleted'));
//        Log::info('class : ' . get_class($this) . ' function :' . __FUNCTION__ . ' Kişi : ' . Auth::user()->UserFullName() . ' Kayıt ID : ' . $record->id . ' - IP :' . Auth::user()->getUserIp());

        return redirect()->route($this->redirectRouteName . $this->view .'index');
    }


    public function save($record)
    {
        $input = Input::all();

        $input['status'] = Input::get('status') == "on" ? true : false;

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
                $result = $this->model->updateRich($input,$record->id);

                //Log::info('class : ' . get_class($this) . ' function :' . __FUNCTION__ . ' Kişi : ' . Auth::user()->UserFullName() . ' Kayıt ID : ' . $record->id . ' - IP :' . Auth::user()->getUserIp());
                //event(new ModelCRUD('model','methof','isim','id','ip'));

                event(new ModelCRUD(get_class($this), __FUNCTION__, Auth::user()->UserFullName(), $record->id, Auth::user()->getUserIp()));

            } else {
                $result = $this->model->create($input);
                if (!empty($result)) {
                    $result = true;
                }
            }
            if ($result) {
                Session::flash('flash_message', trans('common.message_model_updated'));
                //Log::info('class : ' . get_class($this) . ' function :' . __FUNCTION__ . ' Kişi : ' . Auth::user()->UserFullName() . ' Kayıt ID : ' . $record->id . ' - IP :' . Auth::user()->getUserIp());
                return Redirect::route($this->redirectRouteName . $this->view . 'index', $record);
            } else {
                return Redirect::back()
                    ->withErrors(trans('common.save_failed'))
                    ->withInput($input);
            }
        }
    }
}
