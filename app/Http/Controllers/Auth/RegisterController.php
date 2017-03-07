<?php

namespace App\Http\Controllers\Auth;

use App\Models\SocialProvider;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'active' => false,
            'status' => 0
        ]);
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        Auth::logout();

        return redirect('/login')->withInfo('Please now activate your account.');
    }


    /**
     * Redirect the user to the GitHub,Google,Facebook,Twitter authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub,Google,Facebook,Twitter
     * https://www.youtube.com/watch?v=T49xhjxFNX4
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        try
        {
            $socialUser = Socialite::driver($provider)->user();

        }catch (\Exception $e)
        {
            return redirect('/');
        }

        $socialProvider = SocialProvider::where('provider_id',$socialUser->getId())->first();

        if(!$socialProvider){

            //TODO password alanı zorunlu olduğu için hata veriyor.
            //social sitelerin register api lerine bakılacak.
            //create a new user and provider
            $user = User::firstOrCreate(
                ['email' => $socialUser->getEmail()],
                ['name' => $socialUser->getName()]
            );

            $user->social_providers()->create(
                ['provider_id' => $socialUser->getId(), 'provider' => $provider]
            );

        }else{
            $user = $socialProvider->user;
        }

        auth()->login($user);

        return redirect('/home');
    }



}
