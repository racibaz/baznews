<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Role;
use App\Models\Setting;
use App\Models\User;
use App\Repositories\UserRepository as Repo;
use Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/account';

    protected $repo;
    /**
     * RegisterController constructor.
     * Create a new controller instance.
     */
    public function __construct(Repo $repo)
    {
        $this->middleware('guest');
        $this->repo = $repo;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //kullanıcı sözleşmesi Setting  de zorunlu hale getirilmişse kullanıcı kayıt olmadan kontrol ediyoruz.
        $userCheckContractValidation = Cache::tags('Setting')->get('user_contract_force') == 1 ? 'required' : '';

        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'user_contract' => $userCheckContractValidation,
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        // "status" kısmını User modelinde kontrol ediyoruz.
        $user = $this->repo->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        //Setting de belirtilen default role atıyoruz.
        $defaultRole = Role::find(Cache::tags('Setting')->get('user_default_role'));
        $user->roles()->attach($defaultRole);

        //Setting de belirtilen default group atıyoruz.
        $defaultGroup = Group::find(Cache::tags('Setting')->get('user_default_group'));
        $user->groups()->attach($defaultGroup);

        return $user;
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  mixed $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        switch (Cache::tags('Setting')->get('user_registration_type'))
        {
            case Setting::PUBLIC:
                return redirect('/login');
                break;
            case Setting::PRIVATE:
                Auth::logout();
                return redirect()->back()->withErrors(trans('setting.user_registration_type.private'));
                break;
            case Setting::VERIFIED:
                Auth::logout();
                return redirect()->back()->withErrors(trans('setting.user_registration_type.verified'));
                break;
            case Setting::NONE:
                Auth::logout();
                return redirect()->back()->withErrors(trans('setting.user_registration_type.none'));
                break;
        }
    }
}
