<?php

namespace App\Modules\News\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Venturecraft\Revisionable\RevisionableTrait;

class VideoGallery extends Model
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
                'source' => ['title']
            ]
        ];
    }

    protected $fillable = ['video_category_id', 'user_id', 'title', 'slug', 'description', 'keywords', 'thumbnail', 'is_cuff', 'is_active'];

    public function news()
    {
        return $this->belongsToMany('App\Modules\News\Models\News');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function video_category()
    {
        return $this->belongsTo('App\Modules\News\Models\VideoCategory');
    }

    public function videos()
    {
        return $this->hasMany('App\Modules\News\Models\Video');
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