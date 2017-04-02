<?php

namespace App\Modules\News\Models;

use App\Models\Link;
use App\Traits\Eventable;
use Cviebrock\EloquentSluggable\Sluggable;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Venturecraft\Revisionable\RevisionableTrait;

class VideoCategory extends Model
{
    use Eventable;
    use RevisionableTrait;
    use Sluggable;
    use NodeTrait;

    public static function boot()
    {
        parent::boot();

        static::created(function ($record) {
            if($record->is_active) {
                $link = new Link();
                $link->url = $record->slug;
                $record->links()->save($link);
            }
        });

        static::updated(function ($record) {
            if($record->is_active) {
                $link = Link::where('linkable_id', $record->id)->where('linkable_type', VideoCategory::class)->first();
                $link->url = $record->slug;
                $record->links()->save($link);
            }
        });

        static::deleted(function ($record) {
            $link = Link::where('linkable_id', $record->id)->where('linkable_type', VideoCategory::class)->first();
            $record->links()->delete($link);
        });
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable() {
        return [
            'slug' => [
                'source' => ['name']
            ]
        ];
    }

    protected $table = 'video_categories';
    protected $fillable = ['parent_id', '_lft', '_rgt', 'name', 'slug', 'description', 'keywords', 'hit', 'icon', 'is_cuff', 'is_active'];


    public function video_galleries()
    {
        return $this->hasMany(VideoGallery::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function links()
    {
        return $this->morphMany(Link::class, 'linkable');
    }

    public static function videoCategoryList()
    {
        return VideoCategory::where('is_active',1)->pluck('name', 'id');
    }
}
