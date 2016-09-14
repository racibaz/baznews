<?php

namespace App\Modules\News\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class VideoGallery extends Model
{
    protected $fillable = ['video_category_id', 'user_id', 'title', 'slug', 'description', 'keywords', 'is_active'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function video_category()
    {
        return $this->belongsTo('App\Modules\News\Models\VideoCategory');
    }

    public static function validate($input) {
        $rules = array(
            'user_id' => 'required',
            'title' => 'required',
        );
        return Validator::make($input, $rules);
    }

    public static function videoGalleryList()
    {
        return VideoGallery::where('is_active',1)->pluck('title', 'id');
    }
}