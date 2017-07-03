<?php

namespace App\Models;

use App\Traits\Eventable;
use App\Transformers\MenuTransformer;
use Cocur\Slugify\Slugify;
use Cviebrock\EloquentSluggable\Sluggable;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use Eventable;
    use SoftDeletes;
    use Sluggable;
    use NodeTrait {
        NodeTrait::replicate insteadof Sluggable;
    }

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


    public $transformer = MenuTransformer::class;
    protected $fillable = ['parent_id', '_lft', '_rgt', 'page_id', 'name', 'slug', 'url', 'route', 'icon', 'order', 'is_header', 'is_footer', 'is_active'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function page()
    {
        return $this->belongsTo('App\Models\Page');
    }

    public static function menuList()
    {
        return Menu::where('is_active', 1)->pluck('name', 'id');
    }
}