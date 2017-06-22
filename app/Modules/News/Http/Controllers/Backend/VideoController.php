<?php

namespace App\Modules\News\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;
use App\Library\Uploader;
use App\Models\Tag;
use App\Modules\News\Http\Requests\VideoRequest;
use App\Modules\News\Models\Video;
use App\Modules\News\Models\VideoCategory;
use App\Modules\News\Models\VideoGallery;
use App\Modules\News\Repositories\VideoRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class VideoController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'video.';
        $this->redirectViewName = 'backend.';
        $this->repo= $repo;
    }

    public function index()
    {
        $records = $this->repo->orderBy('updated_at', 'desc')->paginate();
        return Theme::view('news::' . $this->getViewName(__FUNCTION__),compact(['records']));
    }

    public function create()
    {
        $tagIDs = [];

        $record = $this->repo->createModel();
        $videoCategoryList = VideoCategory::videoCategoryList();
        $videoGalleryList = VideoGallery::videoGalleryList();
        $tagList = Tag::tagList();

        return Theme::view('news::' . $this->getViewName(__FUNCTION__),compact([
            'record',
            'videoCategoryList',
            'videoGalleryList',
            'tagList',
            'tagIDs',
        ]));
    }


    public function store(VideoRequest $request)
    {
        return $this->save($this->repo->createModel());
    }

    public function show(Video $record)
    {
        return Theme::view('news::' . $this->getViewName(__FUNCTION__),compact('record'));
    }

    public function edit(Video $record)
    {
        $tagIDs = [];
        $videoCategoryList = VideoCategory::videoCategoryList();
        $videoGalleryList = VideoGallery::videoGalleryList();
        $tagList = Tag::tagList();

        foreach ($record->tags as $index => $tag){
            $tagIDs[$index] = $tag->id;
        }


        return Theme::view('news::' . $this->getViewName(__FUNCTION__),compact([
            'record',
            'videoCategoryList',
            'videoGalleryList',
            'tagList',
            'tagIDs',
        ]));
    }


    public function update(VideoRequest $request, Video $record)
    {
        return $this->save($record);
    }

    public function destroy(Video $record)
    {
        $this->repo->deleteVideoFiles($record);
        $this->repo->delete($record->id);

        $this->removeCacheTags(['VideoController']);
        $this->removeHomePageCache();

        return redirect()->route($this->redirectRouteName . $this->view .'index');
    }

    public function save($record)
    {
        $input = Input::all();

        /*todo
         *
         * migrate schema da set null ve cascade parametrelerini demememe rağmen
         * null olarak kayıt yaptırmaya çalıştığmızda hata veriyor.
        */
        if(empty($input['video_category_id']))
            unset($input['video_category_id']);

        if(empty($input['video_gallery_id']))
            unset($input['video_gallery_id']);

        $input['is_comment'] = Input::get('is_comment') == "on" ? true : false;
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;


        if (isset($record->id)) {
            $result = $this->repo->update($record->id,$input);
        } else {
            $result = $this->repo->create($input);
        }

        if ($result) {

            //todo video yüklenebilecek.
            //file
            if(!empty($input['thumbnail'])) {

                $destination = '/videos/'. $result->id;
                Uploader::removeDirectory($destination);

                $document_name = $input['thumbnail']->getClientOriginalName();
                Uploader::fileUpload($result , 'thumbnail', $input['thumbnail'] , $destination , $document_name);

                $originalPhotoPath = public_path('videos/'. $result->id .'/'. $result->thumbnail);

                Image::make($originalPhotoPath)
                    ->resize(58, 58)
                    ->save(public_path('videos/'. $result->id .'/58x58_' . $document_name));

                Image::make($originalPhotoPath)
                    ->resize(497, 358)
                    ->save(public_path('videos/'. $result->id .'/497x358_' . $document_name));

                Image::make($originalPhotoPath)
                    ->resize(658, 404)
                    ->save(public_path('videos/'. $result->id .'/658x404_' . $document_name));

                Image::make($originalPhotoPath)
                    ->resize(224, 195)
                    ->save(public_path('videos/'. $result->id .'/224x195_' . $document_name));

                Image::make($originalPhotoPath)
                    ->resize(165, 90)
                    ->save(public_path('videos/'. $result->id .'/165x90_' . $document_name));

                Image::make($originalPhotoPath)
                    ->resize(457, 250)
                    ->save(public_path('videos/'. $result->id .'/257x250_' . $document_name));
            }


            $this->tagsVideoStore($result,$input);

            /*
             * Delete home page cache and related caches
             * */
            $this->removeCacheTags(['VideoController']);
            $this->removeHomePageCache();

            Session::flash('flash_message', trans('common.message_model_updated'));
            return Redirect::route($this->redirectRouteName . $this->view . 'index', $record);
        } else {
            return Redirect::back()
                ->withErrors(trans('common.save_failed'))
                ->withInput($input);
        }
    }

    public function tagsVideoStore(Video $record, $input)
    {
        if(isset($input['tags_ids'])) {
            $record->tags()->sync($input['tags_ids']);
        }
    }
}
