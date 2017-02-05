<?php

namespace App\Modules\News\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Venturecraft\Revisionable\RevisionableTrait;

class VideoCategory extends Model
{
    use RevisionableTrait;

    use Sluggable;

    use NodeTrait;

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
        return $this->hasMany('App\Modules\News\Models\VideoGallery');
    }

    public function videos()
    {
        return $this->hasMany('App\Modules\News\Models\Video');
    }

    public static function validate($input) {
        $rules = array(
            'name'                     => 'required',
            'hit'   => 'integer',
            'icon' => 'image|max:255',
        );
        return Validator::make($input, $rules);
    }

    public static function videoCategoryList()
    {
        return VideoCategory::where('is_active',1)->pluck('name', 'id');
    }
}
