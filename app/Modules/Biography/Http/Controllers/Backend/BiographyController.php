<?php

namespace App\Modules\Biography\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;
use App\Library\Link\LinkShortener;
use App\Library\Uploader;
use App\Models\Setting;
use App\Modules\Biography\Http\Requests\BiographyRequest;
use App\Modules\Biography\Models\Biography;
use App\Modules\Biography\Repositories\BiographyRepository as Repo;
use Mremi\UrlShortener\Model\Link;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Image;

class BiographyController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'biography.';
        $this->redirectViewName = 'backend.';
        $this->repo = $repo;
    }

    public function getViewName($methodName)
    {
        return $this->redirectViewName . $this->view . $methodName;
    }


    public function index()
    {
        $records = $this->repo->orderBy('created_at', 'desc')->paginate();
        return view('biography::' . $this->getViewName(__FUNCTION__), compact(['records']));
    }


    public function create()
    {
        $statusList = $this->repo->getUserStatuses();

        $record = $this->repo->createModel();
        return view('biography::' . $this->getViewName(__FUNCTION__), compact([
            'record',
            'statusList'
        ]));
    }


    public function store(BiographyRequest $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(Biography $record)
    {
        $statuses = Biography::$statuses;
        return view('biography::' . $this->getViewName(__FUNCTION__), compact('record'));
    }


    public function edit(Biography $record)
    {
        $statusList = $this->repo->getUserStatuses();

        return view('biography::' . $this->getViewName(__FUNCTION__), compact([
            'record',
            'statusList'
        ]));
    }


    public function update(BiographyRequest $request, Biography $record)
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

        if (isset($record->id)) {
            $result = $this->repo->update($record->id, $input);
        } else {
            $result = $this->repo->create($input);
        }

        if ($result) {

            if (!empty($input['photo'])) {

                Uploader::removeDirectory('images/biographies/' . $result->id);

                $document_name = $input['photo']->getClientOriginalName();
                $destination = '/images/biographies/' . $result->id . '/thumbnail';
                Uploader::fileUpload($result, 'photo', $input['photo'], $destination, $document_name);

                $path = public_path('images/biographies/' . $result->id . '/thumbnail/' . $result->photo);

                Image::make($path)
                    ->fit(104, 78)
                    ->save(public_path('images/biographies/' . $result->id . '/104x78_' . $document_name));

                Image::make($path)
                    ->fit(200, 150)
                    ->save(public_path('images/biographies/' . $result->id . '/200x150_' . $document_name));
            }


            /*
             * slug değişmiş ise ve link kısaltmaya izin verilmişse google link kısaltma servisi ile 'short_link' alanına ekliyoruz.
             *
             * */
            if (($record->slug != $result->slug) && Setting::isUrlShortener()) {

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
