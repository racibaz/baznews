<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;
use Laravel\Scout\Searchable;

class Tag extends Model
{
    use Searchable;
    use Sluggable;


    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'dev_TAGS';
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

    //TODO $fillable   ALANLAR VE VİEW TARAFI DÜZENLENECEK.

    protected $fillable = [
        'taggable_id',
        'taggable_type',
        'name'
    ];

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

    public static function validate($input) {
        $rules = array(
            'name'                          => 'required|min:1|max:255',
        );
        return Validator::make($input, $rules);
    }

    public static function tagList()
    {
        return Tag::pluck('name','id');
    }

}
