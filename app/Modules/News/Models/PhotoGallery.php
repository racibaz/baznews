<?php

namespace App\Modules\News\Models;

use App\Modules\News\Transformers\PhotoGalleryTransformer;
use App\Traits\Eventable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Venturecraft\Revisionable\RevisionableTrait;

class PhotoGallery extends Model
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
    public $transformer = PhotoGalleryTransformer::class;
    protected $fillable = ['photo_category_id', 'user_id', 'title', 'slug', 'short_url', 'description', 'keywords', 'thumbnail', 'is_cuff','is_active'];


    public function news()
    {
        return $this->belongsToMany(News::class, 'news_photo_galleries', 'photo_gallery_id', 'news_id');
    }

    //todo core model
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function photo_category()
    {
        return $this->belongsTo(PhotoCategory::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    //todo core model
    public function tags()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }

    public static function photoGalleryList()
    {
        return PhotoGallery::where('is_active',1)->pluck('title', 'id');
    }
}