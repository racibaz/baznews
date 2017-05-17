<?php

namespace App\Modules\News\Models;

use App\Models\Link;
use App\Modules\News\Transformers\NewsCategoryTransformer;
use App\Traits\Eventable;
use Cocur\Slugify\Slugify;
use Cviebrock\EloquentSluggable\Sluggable;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Venturecraft\Revisionable\RevisionableTrait;

class NewsCategory extends Model
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
                $link = Link::where('linkable_id', $record->id)->where('linkable_type', NewsCategory::class)->first();
                $link->url = $record->slug;
                $record->links()->save($link);
            }
        });

        static::deleted(function ($record) {
            $link = Link::where('linkable_id', $record->id)->where('linkable_type', NewsCategory::class)->first();
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

    public function customizeSlugEngine(Slugify $engine, $attribute)
    {
        return $engine->activateRuleset('turkish');
    }


    protected $table = 'news_categories';
    public $transformer = NewsCategoryTransformer::class;
    protected $fillable = ['parent_id', '_lft', '_rgt', 'name', 'slug', 'description', 'keywords', 'hit', 'thumbnail', 'is_cuff', 'is_active'];

    public function news()
    {
        return $this->belongsToMany(News::class, 'news_categories_news', 'news_category_id', 'news_id');
    }

    public function links()
    {
        return $this->morphMany(Link::class, 'linkable');
    }

    public static function validate($input) {
        $rules = array(
            'name' => 'required',
            'thumbnail' => 'image|max:255',
        );
        return Validator::make($input, $rules);
    }

    public static function newsCategoryList()
    {
        return NewsCategory::where('is_active',1)->pluck('name', 'id');
    }
}
