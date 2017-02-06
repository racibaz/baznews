<?php

namespace App\Modules\News\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Library\Uploader;
use App\Models\Tag;
use App\Modules\News\Models\Video;
use App\Modules\News\Models\VideoCategory;
use App\Modules\News\Models\VideoGallery;
use App\Modules\News\Repositories\VideoRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Lakshmajim\Thumbnail\Facade\Thumbnail;

class VideoController extends Controller
{
    private $repo;
    private $view = 'video.';
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
        $records = $this->repo->orderBy('updated_at', 'desc')->findAll();
        return Theme::view('news::' . $this->getViewName(__FUNCTION__),compact(['records']));
    }


    public function create()
    {
        $tagIDs = [];
        $videoGalleryList = VideoGallery::videoGalleryList();
        $record = $this->repo->createModel();

        $tagList = Tag::tagList();

        return Theme::view('news::' . $this->getViewName(__FUNCTION__),compact([
            'record',
            'videoGalleryList',
            'tagList',
            'tagIDs',
        ]));
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

        /*todo
         *
         * migrate schema da set null ve cascade parametrelerini demememe rağmen
         * null olarak kayıt yaptırmaya çalıştığmızda hata veriyor.
        */
        if(empty($input['video_category_id']))
            unset($input['video_category_id']);

        if(empty($input['video_gallery_id']))
            unset($input['video_gallery_id']);

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
            }
            if ($result[0]) {


                //todo video yüklenebilecek.
                //file

                if(!empty($input['thumbnail'])) {
                    $oldPath = $record->thumbnail;
                    $document_name = $input['thumbnail']->getClientOriginalName();
                    $destination = '/videos/'. $result[1]->id;
                    Uploader::fileUpload($result[1] , 'thumbnail', $input['thumbnail'] , $destination , $document_name);
                    Uploader::removeFile($destination . '/' . $oldPath);


                    Image::make(public_path('videos/'. $result[1]->id .'/'. $result[1]->thumbnail))
                        ->resize(58, 58)
                        ->save(public_path('videos/'. $result[1]->id .'/58x58_' . $document_name));

                    Image::make(public_path('videos/'. $result[1]->id .'/'. $result[1]->thumbnail))
                        ->resize(497, 358)
                        ->save(public_path('videos/'. $result[1]->id .'/497x358_' . $document_name));

                    Image::make(public_path('videos/'. $result[1]->id .'/'. $result[1]->thumbnail))
                        ->resize(658, 404)
                        ->save(public_path('videos/'. $result[1]->id .'/658x404_' . $document_name));

                    Image::make(public_path('videos/'. $result[1]->id .'/'. $result[1]->thumbnail))
                        ->resize(224, 195)
                        ->save(public_path('videos/'. $result[1]->id .'/224x195_' . $document_name));

                    Image::make(public_path('videos/'. $result[1]->id .'/'. $result[1]->thumbnail))
                        ->resize(165, 90)
                        ->save(public_path('videos/'. $result[1]->id .'/165x90_' . $document_name));

                    Image::make(public_path('videos/'. $result[1]->id .'/'. $result[1]->thumbnail))
                        ->resize(457, 250)
                        ->save(public_path('videos/'. $result[1]->id .'/257x250_' . $document_name));







                    $thumbnail_path   = asset('video_gallery/' . $record->video_gallery_id . '/photos') ;

                    $video_path       = asset('video_gallery/' . $record->video_gallery_id . '/videos/' . $record->file);


                    // set thumbnail image name
                    $thumbnail_image  = asset('thumbnail_time.jpg');

                    // set the thumbnail image "palyback" video button
                    $water_mark       = public_path() . '/player.png';

                    // get video length and process it
                    // assign the value to time_to_image (which will get screenshot of video at that specified seconds)
                    $time_to_image    = floor(1000/2);



                    $thumbnail_status = Thumbnail::getThumbnail($video_path,$thumbnail_path,$thumbnail_image,160,128,$time_to_image,$water_mark,true);


                    dd($thumbnail_status);


                    if($thumbnail_status)
                    {
                        echo "Thumbnail generated";
                    }
                    else
                    {
                        echo "thumbnail generation has failed";
                    }







                }


                $this->tags_video_store($result[1],$input);

                Session::flash('flash_message', trans('common.message_model_updated'));
                return Redirect::route($this->redirectRouteName . $this->view . 'index', $record);
            } else {
                return Redirect::back()
                    ->withErrors(trans('common.save_failed'))
                    ->withInput($input);
            }
        }
    }



    public function tags_video_store(Video $record, $input)
    {
        if(isset($input['tags_ids'])) {
            $record->tags()->sync($input['tags_ids']);
        }
    }





}
