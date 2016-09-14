<?php

namespace App\Modules\News\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Modules\News\Models\Video;
use App\Modules\News\Models\VideoGallery;
use App\Modules\News\Repositories\VideoRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class VideoController extends Controller
{
    private $repo;
    private $view = 'video.';
    private $redirectViewName = 'backend.';
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
        $records = $this->repo->orderBy('updated_at', 'desc')->findAll();
        return Theme::view('news::' . $this->getViewName(__FUNCTION__),compact(['records']));
    }


    public function create()
    {
        $videoGalleryList = VideoGallery::videoGalleryList();
        $record = $this->repo->createModel();
        return Theme::view('news::' . $this->getViewName(__FUNCTION__),compact(['record', 'videoGalleryList']));
    }


    public function store(Request $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(Video $record)
    {
        return Theme::view('news::' . $this->getViewName(__FUNCTION__),compact('record'));
    }


    public function edit(Video $record)
    {
        $videoGalleryList = VideoGallery::videoGalleryList();
        return Theme::view('news::' . $this->getViewName(__FUNCTION__),compact(['record', 'videoGalleryList']));
    }


    public function update(Request $request, Video $record)
    {
        return $this->save($record);
    }


    public function destroy(Video $record)
    {
        $this->repo->delete($record->id);
        return redirect()->route($this->redirectRouteName . $this->view .'index');
    }


    public function save($record)
    {
        $input = Input::all();

        $input['is_active'] = Input::get('is_active') == "on" ? true : false;

        $v = Video::validate($input);

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
