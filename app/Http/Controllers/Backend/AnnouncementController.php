<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\AnnouncementRequest;
use App\Models\Announcement;
use App\Repositories\AnnouncementRepository as Repo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class AnnouncementController extends BackendController
{
    /**
     * AnnouncementController constructor.
     * @param Repo $repo
     */
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'announcement.';
        $this->redirectViewName = 'backend.';
        $this->repo = $repo;
    }

    public function index()
    {
        $announcement_list = null;
        $user_groups = Auth::user()->groups;
        /*
         * Kullanıcının bulunduğu grupları alıyoruz sonrasında bu gruplara
         * bağlı olan dokümanları alıyoruz.
         */

        foreach ($user_groups as $group) {
            foreach ($group->announcements as $announcement) {
                $announcement_list = $announcement_list . '/' . $announcement->id;
            }
        }

        $records = explode("/", $announcement_list);

        $announcements = Announcement::whereIn('id', array_unique($records))
            ->where('is_active', 1)
            ->where(function ($query) {
                $query->where('show_time', '>=', Carbon::now());
            })
            ->orderBy('updated_at', 'desc')
            ->get();

        $records = $this->repo->paginate();
        return view($this->getViewName(__FUNCTION__), compact('records', 'announcements'));
    }


    public function create()
    {
        $groupList = Auth::user()->groups;
        $record = $this->repo->createModel();
        return view($this->getViewName(__FUNCTION__), compact(['record', 'groupList']));
    }


    public function store(AnnouncementRequest $request)
    {
        return $this->save($this->repo->createModel());
    }

    public function save($record)
    {
        $input = Input::all();
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;

        if (isset($record->id)) {
            $result = $this->repo->update($record->id, $input);
        } else {
            $result = $this->repo->create($input);
        }

        if ($result) {

            $this->announcementGroupStore($result, $input);

            Session::flash('flash_message', trans('common.message_model_updated'));
            return Redirect::route($this->redirectRouteName . $this->view . 'index', $result);
        } else {
            return Redirect::back()
                ->withErrors(trans('common.save_failed'))
                ->withInput($input);
        }
    }

    public function announcementGroupStore(Announcement $record, $input)
    {
        if (isset($input['announcement_group_store_'])) {
            $record->groups()->sync($input['announcement_group_store_']);
        }
    }

    public function show(Announcement $record)
    {
        $groupList = Auth::user()->groups;
        return view($this->getViewName(__FUNCTION__), compact(['record', 'groupList']));
    }

    public function edit(Announcement $record)
    {
        $groupList = Auth::user()->groups;
        return view($this->getViewName(__FUNCTION__), compact(['record', 'groupList']));
    }

    public function update(AnnouncementRequest $request, Announcement $record)
    {
        return $this->save($record);
    }

    public function destroy(Announcement $record)
    {
        $this->repo->delete($record->id);
        return redirect()->route($this->redirectRouteName . $this->view . 'index');
    }

    public function announcement_list()
    {
        $announcement_list = null;
        $user_groups = Auth::user()->groups;
        /*
         * Kullanıcının bulunduğu grupları alıyoruz sonrasında bu gruplara
         * bağlı olan duyuruları alıyoruz.
         */

        foreach ($user_groups as $group) {
            foreach ($group->announcements as $announcement) {
                $announcement_list = $announcement_list . '/' . $announcement->id;
            }
        }

        $records = explode("/", $announcement_list);

        $announcements = Announcement::whereIn('id', array_unique($records))
            ->where('is_active', 1)
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('backend.announcement.list')
            ->with('records', $announcements);
    }

}
