<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Backend\BackendController;
use App\Models\Account;
use App\Models\City;
use App\Models\Country;
use App\Models\User;
use App\Repositories\AccountRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class AccountController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'account.';
        $this->redirectViewName = 'frontend.';
        $this->repo = $repo;
    }

    public function getViewName($methodName)
    {
        return $this->redirectViewName . $this->view . $methodName;
    }

    public function index()
    {
        $record = \Auth::user();
        return Theme::view($this->getViewName(__FUNCTION__), compact('record'));
    }
    
    public function edit(Account $record)
    {
        if(auth()->user()->getAuthIdentifier() <> $record->id){
            Log::warning('Yetkisiz Alana Girmeye Çalışıldı. uri :' . Route::getCurrentRoute()->uri() . ' : user_id : ' . auth()->user()->getAuthIdentifier() . '  IP :' . auth()->user()->getUserIp());
            abort(403, 'Unauthorized action.');
        }

        $countries = Country::countryList();
        $cities = City::cityList();
        $userAvatar = User::getUserAvatar($record->email);

        return Theme::view($this->getViewName(__FUNCTION__), compact([
            'record',
            'countries',
            'cities',
            'userAvatar'
        ]));
    }


    public function update(Request $request, Account $record)
    {
        return $this->save($record);
    }

    public function save($record)
    {
        $input = Input::all();
        $input['password'] = empty($input['password']) ? $record->password : bcrypt($input['password']);

        // İçeriklerde ki html tag leri temizliyoruz.
        $input = removeHtmlTagsOfFields($input, [
            '_method',
            '_token',
            'password',
        ]);

        //todo request validation formatında kontol yapılabilinir.
        //kullanıcı email adresini guncellediğinde email adresini uniqe olduğu için
        //kendi email adresini daha önce kayıtlı olarak görüyor ve hata veriyor
        //bundan dolayı aynı ise burada unique validasyonunu atlamış oluyoruz.
        $rules = [
            'cell_phone' => 'numeric|min:10|nullable',
            'facebook' => 'url|nullable',
            'twitter' => 'url|nullable',
            'pinterest' => 'url|nullable',
            'linkedin' => 'url|nullable',
            'youtube' => 'url|nullable',
            'web_site' => 'url|nullable',
            'bio_note' => 'string|max:1000|nullable',
            'IP' => 'ip',
        ];

        $v = Validator::make($input, $rules);

        if ($v->fails()) {
            return Redirect::back()
                ->withErrors($v)
                ->withInput($input);
        } else {

            $result = null;

            if (isset($record->id)) {
                $result = $this->repo->update($record->id, $input);
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


    public function changePasswordView()
    {
        $record = \Auth::user();
        return Theme::view($this->getViewName(__FUNCTION__), compact('record'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(Request $request)
    {
        $input = Input::all();

        $record = \Auth::user();

        $rules = [
            'password' => 'required|min:4|Confirmed',
            'password_confirmation' => 'required|min:4',
        ];

        $v = Validator::make($input, $rules);


        if ($v->fails()) {
            return Redirect::back()
                ->withErrors($v)
                ->withInput($input);
        }

        $input['password'] = bcrypt($input['password']);

        list($result, $instance) = $this->repo->update($record->id, $input);

        if ($result) {
            Session::flash('flash_message', trans('account.password_changed'));
            return Redirect::route($this->redirectRouteName . $this->view . 'index', $record);
        }

        Session::flash('flash_message', trans('account.password_not_changed'));
        return Redirect::back();
    }
}
