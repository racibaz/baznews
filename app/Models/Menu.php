<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;
use Kalnoy\Nestedset\NodeTrait;

class Menu extends Model
{
    use Sluggable;
    use NodeTrait;
    use SoftDeletes;

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

    protected $fillable = ['parent_id', '_lft', '_rgt', 'page_id', 'name', 'slug', 'url', 'route', 'icon', 'order' ,'is_active'];
    protected $dates = ['created_at','updated_at','deleted_at'];

    public function page()
    {
        return $this->belongsTo('App\Models\Page');
    }

    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
    }

    public static function validate($input) {
        $rules = array(
            'name' => 'Required',
            '_lft' => 'integer',
            '_rgt' => 'integer',
            'page_id' => 'integer',
            'url'   => 'url|max:255',
            'route'   => 'max:255',
            'icon' => 'mimes:ico,jpg,jpeg,png,gif,bmp',
            'order' => 'integer',
        );
        return Validator::make($input, $rules);
    }

    public static function menuList()
    {
        return Menu::where('is_active',1)->pluck('name', 'id');
    }

}