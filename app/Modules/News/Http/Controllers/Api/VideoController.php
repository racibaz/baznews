<?php

namespace App\Modules\News\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\News\Repositories\VideoRepository as Repo;
use App\Modules\News\Transformers\VideoTransformer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;

class VideoController extends Controller
{
    private $repo;

    public function __construct(Repo $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $input = Input::all();

        $sort = isset($input['sort']) ? $input['sort'] : 'id';
        $sortType = isset($input['sort_type']) ? $input['sort_type'] : 'asc';
        $filters = isset($input['filters']) ? $input['filters'] : "*";
        $page = isset($input['page']) ? $input['page'] : 1;
        $pageEntries = isset($input['page_entries']) ? $input['page_entries'] : 10;

        return Cache::tags('Video','Api')->rememberForever('api.videos.' . $sort . $sortType . $filters .$page . $pageEntries, function() use ($sort, $sortType, $filters, $page, $pageEntries) {

            if($filters == "*")
                $filters = ["*"];
            else
                $filters = explode(',', $filters);

            try{
                $records = $this->repo
                    ->where('is_active', 1)
                    ->orderBy($sort, $sortType)
                    ->paginate($pageEntries,$filters,'page',$page);

                return  fractal()
                    ->collection($records)
                    ->transformWith(new VideoTransformer)
                    ->toJson();

            }catch (ModelNotFoundException $e){

                return response()->setStatusCode(404);
            }
        });
    }

    public function show($id)
    {
        $input = Input::all();
        $sort = isset($input['sort']) ? $input['sort'] : 'id';
        $sortType = isset($input['sort_type']) ? $input['sort_type'] : 'asc';
        $filters = isset($input['filters']) ? $input['filters'] : "*";

        return Cache::tags('Video','Api')->rememberForever('api.videoItem'. $id . $sort . $sortType . $filters, function() use ($id, $sort, $sortType, $filters) {

            if($filters == "*")
                $filters = ["*"];
            else
                $filters = explode(',', $filters);

            try{
                $record = $this->repo
                    ->with([
                        'video_category',
                        'video_gallery',
                        'tags'
                    ])
                    ->where('is_active', 1)
                    ->orderBy($sort, $sortType)
                    ->find($id, $filters);

                return  fractal()
                    ->item($record)
                    ->parseIncludes([
                        ($record->video_category) ? 'video_category': '',
                        ($record->video_gallery) ? 'video_gallery': '',
                    ])
                    ->transformWith(new VideoTransformer)
                    ->toArray();

            }catch (ModelNotFoundException $e){

                return response()->setStatusCode(404);
            }
        });
    }
}
