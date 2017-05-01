<?php

namespace App\Modules\News\Models;

use App\Traits\Eventable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\RevisionableTrait;

class Photo extends Model
{
    use Eventable;
    use SoftDeletes;
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
                'source' => ['name','id']
            ]
        ];
    }
    
    protected $fillable = ['photo_gallery_id', 'name', 'subtitle', 'slug', 'file', 'link','content', 'keywords', 'order', 'is_active'];
    protected $dates = ['created_at','updated_at','deleted_at'];

    public function news()
    {
        return $this->belongsToMany(News::class, 'news_photos', 'photo_id', 'news_id');
    }

    public function photo_gallery()
    {
        return $this->belongsTo(PhotoGallery::class);
    }

    //todo core model
    public function tags()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }

    public static function photoList()
    {
        return Photo::where('is_active',1)->pluck('name', 'id');
    }
}