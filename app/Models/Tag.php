<?php

namespace App\Models;

use App\Traits\Eventable;
use Cocur\Slugify\Slugify;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use Eventable;
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['name']
            ]
        ];
    }

    public function customizeSlugEngine(Slugify $engine, $attribute)
    {
        return $engine->activateRuleset('turkish');
    }

    //TODO $fillable   ALANLAR VE VİEW TARAFI DÜZENLENECEK.

    protected $fillable = [
        'name',
        'slug'
    ];


//    //todo module news
    public function news()
    {
        return $this->morphedByMany('App\Modules\News\Models\News', 'taggable');
    }

    public function photos()
    {
        return $this->morphedByMany('App\Modules\News\Models\Photo', 'taggable');
    }

    public function photo_galleries()
    {
        return $this->morphedByMany('App\Modules\News\Models\PhotoGallery', 'taggable');
    }

    public function videos()
    {
        return $this->morphedByMany('App\Modules\News\Models\Video', 'taggable');
    }

    public static function tagList()
    {
        return Tag::pluck('name', 'id');
    }
}
