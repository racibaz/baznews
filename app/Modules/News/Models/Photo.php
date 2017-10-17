<?php

namespace App\Modules\News\Models;

use App\Modules\News\Transformers\PhotoTransformer;
use App\Traits\Eventable;
use App\Traits\TagRelationTrait;
use Cocur\Slugify\Slugify;
use Cviebrock\EloquentSluggable\Sluggable;
use Venturecraft\Revisionable\RevisionableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    use Eventable;
    use SoftDeletes;
    use RevisionableTrait;
    use Sluggable;
    use TagRelationTrait;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['name', 'id']
            ]
        ];
    }

    public function customizeSlugEngine(Slugify $engine, $attribute)
    {
        return $engine->activateRuleset('turkish');
    }

    public $transformer = PhotoTransformer::class;
    protected $fillable = ['photo_gallery_id', 'name', 'subtitle', 'slug', 'file', 'link', 'content', 'keywords', 'order', 'is_comment', 'is_active'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function news()
    {
        return $this->belongsToMany(News::class, 'news_photos', 'photo_id', 'news_id');
    }

    public function photo_gallery()
    {
        return $this->belongsTo(PhotoGallery::class);
    }

    public static function photoList()
    {
        return Photo::where('is_active', 1)->pluck('name', 'id');
    }
}