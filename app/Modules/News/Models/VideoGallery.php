<?php

namespace App\Modules\News\Models;

use App\Traits\Eventable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Venturecraft\Revisionable\RevisionableTrait;

class VideoGallery extends Model
{
    use Eventable;
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

    protected $fillable = ['video_category_id', 'user_id', 'title', 'slug', 'short_url', 'description', 'keywords', 'thumbnail', 'is_cuff', 'is_active'];

    public function news()
    {
        return $this->belongsToMany(News::class);
    }

    //todo core model
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function video_category()
    {
        return $this->belongsTo(VideoCategory::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public static function videoGalleryList()
    {
        return VideoGallery::where('is_active',1)->pluck('title', 'id');
    }
}