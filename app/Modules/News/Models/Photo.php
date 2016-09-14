<?php

namespace App\Modules\News\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Photo extends Model
{
    protected $fillable = ['photo_gallery_id', 'name', 'slug', 'file', 'link','description', 'keywords', 'order', 'is_active'];

    public static function validate($input) {
        $rules = array(
            'name' => 'required',
        );
        return Validator::make($input, $rules);
    }

    public static function photoList()
    {
        return PhotoGallery::where('is_active',1)->pluck('name', 'id');
    }
}