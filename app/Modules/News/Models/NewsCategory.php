<?php

namespace App\Modules\News\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Venturecraft\Revisionable\RevisionableTrait;

class NewsCategory extends Model
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

    protected $table = 'news_categories';
    protected $fillable = ['parent_id', '_lft', '_rgt', 'name', 'slug', 'description', 'keywords', 'hit', 'thumbnail', 'is_cuff', 'is_active'];

    public function news()
    {
        return $this->belongsToMany('App\Modules\News\Models\News', 'news_categories_news', 'news_category_id', 'news_id');
    }

    public static function validate($input) {
        $rules = array(
            'name'                     => 'Required',
            'thumbnail' => 'image|max:255',
        );
        return Validator::make($input, $rules);
    }

    public static function newsCategoryList()
    {
        return NewsCategory::where('is_active',1)->pluck('name', 'id');
    }
}
