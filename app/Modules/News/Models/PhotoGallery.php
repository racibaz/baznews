<?php

namespace App\Modules\News\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class PhotoGallery extends Model
{
    protected $fillable = ['user_id', 'title', 'slug', 'description', 'keywords', 'is_active'];

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