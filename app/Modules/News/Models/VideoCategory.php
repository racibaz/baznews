<?php

namespace App\Modules\News\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class VideoCategory extends Model
{
    protected $table = 'video_categories';
    protected $fillable = ['parent_id', '_lft', '_rgt', 'name', 'slug', 'description', 'keywords', 'hit', 'icon', 'is_cuff', 'is_active'];


    public function video_galleries()
    {
        return $this->hasMany('App\Modules\News\Models\VideoGallery');
    }

    public static function validate($input) {
        $rules = array(
            'name'                     => 'required',
        );
        return Validator::make($input, $rules);
    }

    public static function videoCategoryList()
    {
        return VideoCategory::where('is_active',1)->pluck('name', 'id');
    }
}
