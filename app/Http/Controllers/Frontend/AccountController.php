<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\City;
use App\Models\Country;
use App\Models\Event;
use App\Models\User;
use App\Repositories\AccountRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Mews\Purifier\Facades\Purifier;

class AccountController extends Controller
{
    private $repo;
    private $view = 'account.';
    private $redirectViewName = 'frontend.';
    private $redirectRouteName = '';

    public function __construct(Repo $repo)
    {
        $this->repo= $repo;
    }

    public function getViewName($methodName)
    {
        return $this->redirectViewName . $this->view . $methodName;
    }


    public function index()
    {
        $record = \Auth::user();
        return Theme::view($this->getViewName(__FUNCTION__),compact('record'));
    }


    public function show(Account $record)
    {
        $revisions = $record->getUserRevisions($record->id);

        //$events = $record->events();

        $events = Event::where('user_id',$record->id)->get();

        return Theme::view($this->getViewName(__FUNCTION__),compact('record', 'revisions', 'events'));
    }


    public function edit(Account $record)
    {
        $countries = Country::countryList();
        $cities = City::cityList();
        return Theme::view($this->getViewName(__FUNCTION__),compact(['record','countries' ,'cities']));
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
        $input['facebook'] = strip_tags($input['facebook']);
        $input['twitter'] = strip_tags($input['twitter']);
        $input['pinterest'] = strip_tags($input['pinterest']);
        $input['linkedin'] = strip_tags($input['linkedin']);
        $input['youtube'] = strip_tags($input['youtube']);
        $input['web_site'] = strip_tags($input['web_site']);
        $input['bio_note'] = strip_tags($input['bio_note']);

        //kullanıcı email adresini guncellediğinde email adresini uniqe olduğu için
        //kendi email adresini daha önce kayıtlı olarak görüyor ve hata veriyor
        //bundan dolayı aynı ise burada unique validasyonunu atlamış oluyoruz.
        $rules = [
            'facebook'  => 'url|max:255',
            'twitter'  => 'url|max:255',
            'pinterest' => 'url|max:255',
            'linkedin'  => 'url|max:255',
            'youtube'   => 'url|max:255',
            'web_site'   => 'url|max:255',
            'bio_note'  => 'string|max:255',
            'IP'    => 'ip',
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
        return Theme::view($this->getViewName(__FUNCTION__),compact('record'));
    }

    public function changePassword(Request $request)
    {
        $input = Input::all();

        $record = \Auth::user();

        $rules = [
            'password'                      => 'required|min:4|Confirmed',
            'password_confirmation'         => 'required|min:4',
        ];

        $v = Validator::make($input, $rules);


        if ($v->fails()) {
            return Redirect::back()
                ->withErrors($v)
                ->withInput($input);
        }

        $input['password'] = bcrypt($input['password']);

        list($result, $instance) = $this->repo->update($record->id, $input);

        if($result) {
            Session::flash('flash_message', trans('account.password_changed'));
            return Redirect::route($this->redirectRouteName . $this->view . 'index', $record);
        }

    }


}
