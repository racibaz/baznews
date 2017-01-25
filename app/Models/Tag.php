<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;
use Laravel\Scout\Searchable;

class Tag extends Model
{
    use SoftDeletes;
    use Searchable;

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'dev_TAGS';
    }

    //TODO $fillable   ALANLAR VE VİEW TARAFI DÜZENLENECEK.

    protected $fillable = [
        'taggable_id',
        'taggable_type',
        'name',
        'is_active',
    ];
    protected $dates = ['created_at','updated_at','deleted_at'];


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
