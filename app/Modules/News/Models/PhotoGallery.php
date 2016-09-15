<?php

namespace App\Modules\News\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class PhotoGallery extends Model
{
    protected $fillable = ['photo_category_id', 'user_id', 'title', 'slug', 'description', 'keywords', 'is_active'];


    public function news()
    {
        return $this->belongsToMany('App\Modules\News\Models\News', 'news_photo_galleries', 'photo_gallery_id', 'news_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function photo_category()
    {
        return $this->belongsTo('App\Modules\News\Models\PhotoCategory');
    }

    public static function validate($input) {
        $rules = array(
            'user_id' => 'required',
            'title' => 'required',
        );
        return Validator::make($input, $rules);
    }

    public static function photoGalleryList()
    {
        return PhotoGallery::where('is_active',1)->pluck('title', 'id');
    }
}