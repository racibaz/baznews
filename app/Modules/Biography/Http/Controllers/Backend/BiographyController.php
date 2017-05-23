<?php

namespace App\Modules\Biography\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;
use App\Library\Link\LinkShortener;
use App\Library\Uploader;
use App\Models\Setting;
use App\Modules\Biography\Models\Biography;
use App\Modules\Biography\Repositories\BiographyRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Mremi\UrlShortener\Model\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;
use Image;

class BiographyController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'biography.';
        $this->redirectViewName = 'backend.';
        $this->repo= $repo;
    }

    public function getViewName($methodName)
    {
        return $this->redirectViewName . $this->view . $methodName;
    }


    public function index()
    {
        $records = $this->repo->orderBy('updated_at', 'desc')->paginate();
        return Theme::view('biography::' . $this->getViewName(__FUNCTION__), compact(['records']));
    }


    public function create()
    {
        $statusList = $this->repo->getUserStatuses();

        $record = $this->repo->createModel();
        return Theme::view('biography::' . $this->getViewName(__FUNCTION__), compact([
            'record',
            'statusList'
        ]));
    }


    public function store(Request $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(Biography $record)
    {
        $statuses = Biography::$statuses;
        return Theme::view('biography::' . $this->getViewName(__FUNCTION__), compact('record'));
    }


    public function edit(Biography $record)
    {
        $statusList = $this->repo->getUserStatuses();

        return Theme::view('biography::' . $this->getViewName(__FUNCTION__), compact([
            'record',
            'statusList'
        ]));
    }


    public function update(Request $request, Biography $record)
    {
        return $this->save($record);
    }


    public function destroy(Biography $record)
    {
        $this->repo->delete($record->id);

        $this->removeCacheTags(['BiographyController', 'Biography']);
        $this->removeHomePageCache();

        return redirect()->route($this->redirectRouteName . $this->view . 'index');
    }


    public function save($record)
    {
        $input = Input::all();

        $input['is_cuff'] = Input::get('is_cuff') == "on" ? true : false;
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;
        $input['user_id'] = Auth::user()->id;

        $rules = array(
            'title' => [
                'required',
                'max:255',
                Rule::unique('biographies')->ignore($record->id),
            ],
            'name' => [
                'required',
                'max:255',
                Rule::unique('biographies')->ignore($record->id),
            ],
            'slug' => [
                Rule::unique('biographies')->ignore($record->id),
            ],
            'content' => 'required',
            'photo' => 'image',
            'description' => 'max:255|nullable',
            'keywords' => 'max:255|nullable',
            'order' => 'integer',
            'hit' => 'integer',
            'status' => 'integer',
        );
        $v = Validator::make($input, $rules);

        if ($v->fails()) {
            return Redirect::back()
                ->withErrors($v)
                ->withInput($input);
        } else {

            if (isset($record->id)) {
                $result = $this->repo->update($record->id,$input);
            } else {
                $result = $this->repo->create($input);
            }

            if ($result) {

                if(!empty($input['photo'])) {
                    $oldPath = $record->photo;
                    $document_name = $input['photo']->getClientOriginalName();
                    $destination = '/images/biographies/'. $result->id .'/thumbnail';
                    Uploader::fileUpload($result, 'photo', $input['photo'] , $destination , $document_name);
                    Uploader::removeFile($oldPath);

                    Image::make(public_path('images/biographies/' . $result->id .'/thumbnail/'. $result->photo))
                        ->fit(104, 78)
                        ->save(public_path('images/biographies/' . $result->id . '/104x78_' . $document_name));
                }


                /*
                 * slug değişmiş ise ve link kısaltmaya izin verilmişse google link kısaltma servisi ile 'short_link' alanına ekliyoruz.
                 *
                 * */
                if(($record->slug != $result->slug) && Setting::where('attribute_key','is_url_shortener')->first()){

                    $linkShortener = new LinkShortener(new Link);
                    $result->short_url = $linkShortener->linkShortener($result->slug);
                    $result->save();
                }

                $this->removeCacheTags(['BiographyController', 'Biography']);
                $this->removeHomePageCache();

                Session::flash('flash_message', trans('common.message_model_updated'));
                return Redirect::route($this->redirectRouteName . $this->view . 'index', $result);
            } else {
                return Redirect::back()
                    ->withErrors(trans('common.save_failed'))
                    ->withInput($input);
            }
        }
    }
}
