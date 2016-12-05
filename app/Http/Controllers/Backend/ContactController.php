<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactType;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App\Repositories\ContactRepository as Repo;

class ContactController extends Controller
{
    private $repo;
    private $view = 'contact.';
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
        $contactTypeList = ContactType::contacctTypeList();
        $record = $this->repo->createModel();
        return Theme::view($this->getViewName(__FUNCTION__),compact(['record', 'contactTypeList']));
    }


    public function store(Request $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(Contact $record)
    {
        return Theme::view($this->getViewName(__FUNCTION__),compact('record'));
    }


    public function edit(Contact $record)
    {
        $contactTypeList = ContactType::contacctTypeList();
        return Theme::view($this->getViewName(__FUNCTION__),compact(['record', 'contactTypeList']));
    }


    public function update(Request $request, Contact $record)
    {
        return $this->save($record);
    }


    public function destroy(Contact $record)
    {
        $this->repo->delete($record->id);
        return redirect()->route($this->redirectRouteName . $this->view .'index');
    }


    public function save($record)
    {
        $input = Input::all();
        $input['is_read'] = Input::get('is_read') == "on" ? true : false;
        $input['IP'] = Auth::user()->getUserIp();

        $v = Contact::validate($input);

        if ($v->fails()) {
            return Redirect::back()
                ->withErrors($v)
                ->withInput($input);
        } else {

            if (isset($record->id)) {
                $result = $this->repo->update($record->id,$input);
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
