<?php

namespace App\Modules\News\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Venturecraft\Revisionable\RevisionableTrait;

class PhotoGallery extends Model
{
    use RevisionableTrait;

    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable() {
        return [
            'slug' => [
                'source' => ['title','id']
            ]
        ];
    }

    protected $fillable = ['photo_category_id', 'user_id', 'title', 'slug', 'description', 'keywords', 'thumbnail', 'is_cuff','is_active'];


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

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function tags()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
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