<?php namespace App\Http\Controllers\Backend;



use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Repositories\CountryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;



class CountryController extends Controller
{
    protected  $repo;
    private $view = '.country.';
    private $redirectViewName = 'backend';
    private $redirectRouteName = 'admin';


    public function __construct(CountryRepository $repo)
    {
        $this->repo = $repo;
    }

    public function getViewName($methodName)
    {
        return $this->redirectViewName . $this->view . $methodName;
    }

    public function index()
    {

        $records = $records = $this->repo->all();
        return view($this->getViewName(__FUNCTION__))
            ->with('records', $records);
    }


    public function create()
    {
        $record = new Country();
        return view($this->getViewName(__FUNCTION__))
            ->with('record', $record);
    }


    public function store(Request $request)
    {
        return $this->save(new Country());
    }


    public function show(Country $record)
    {
        return view($this->getViewName(__FUNCTION__))
            ->with('record', $record);
    }


    public function edit(Country $record)
    {
        return view($this->getViewName(__FUNCTION__))
            ->with('record', $record);
    }


    public function update(Request $request, Country $record)
    {
        return $this->save($record);
    }


    public function destroy(Country $record)
    {

        $this->repo->delete($record->id);

//        $this->repo->delete($record->id);
//        Session::flash('flash_message', trans('common.message_repo_deleted'));
//        Log::info('class : ' . get_class($this) . ' function :' . __FUNCTION__ . ' Kişi : ' . Auth::user()->CountryFullName() . ' Kayıt ID : ' . $record->id . ' - IP :' . Auth::user()->getCountryIp());

        return redirect()->route($this->redirectRouteName . $this->view .'index');
    }


    public function save($record)
    {
        $input = Input::all();

        $input['status'] = Input::get('status') == "on" ? true : false;

        $v = Country::validate($input);

        if ($v->fails()) {
            return Redirect::back()
                ->withErrors($v)
                ->withInput($input);
        } else {
            
            if (isset($record->id)) {
                $result = $this->repo->update($input,$record->id);

            } else {
                $result = $this->repo->create($input);
                $record = $result;
                if (isset($result)) {
                    $result = true;
                }
            }
            if ($result) {
                Session::flash('flash_message', trans('common.message_repo_updated'));
                //Log::info('class : ' . get_class($this) . ' function :' . __FUNCTION__ . ' Kişi : ' . Auth::user()->CountryFullName() . ' Kayıt ID : ' . $record->id . ' - IP :' . Auth::user()->getCountryIp());
                return Redirect::route($this->redirectRouteName . $this->view . '.index', $record);
            } else {
                return Redirect::back()
                    ->withErrors(trans('common.save_failed'))
                    ->withInput($input);
            }
        }
    }





}
