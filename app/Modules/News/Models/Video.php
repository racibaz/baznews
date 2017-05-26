<?php

namespace App\Modules\News\Models;

use App\Modules\News\Transformers\VideoTransformer;
use App\Traits\Eventable;
use Cocur\Slugify\Slugify;
use Cviebrock\EloquentSluggable\Sluggable;
use Venturecraft\Revisionable\RevisionableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
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

    public function customizeSlugEngine(Slugify $engine, $attribute)
    {
        return $engine->activateRuleset('turkish');
    }


    public $transformer = VideoTransformer::class;

    protected $fillable = [
        'video_category_id',
        'video_gallery_id',
        'name',
        'slug',
        'short_url',
        'subtitle',
        'thumbnail',
        'file',
        'link',
        'embed',
        'content',
        'keywords',
        'order',
        'is_comment',
        'is_active'
    ];

    protected $dates = ['created_at','updated_at','deleted_at'];

    public function video_category()
    {
        return $this->belongsTo(VideoCategory::class);
    }

    public function video_gallery()
    {
        return $this->belongsTo(VideoGallery::class);
    }

    //todo core model
    public function tags()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }

    public static function videoList()
    {
        return Video::where('is_active',1)->pluck('name', 'id');
    }
}