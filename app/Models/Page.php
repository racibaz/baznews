<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Page extends Model
{
    protected $fillable = ['name', 'slug', 'content', 'description', 'keywords' ,'is_active'];

    public function menus()
    {
        return $this->hasMany('App\Models\Menu');
    }

    public static function validate($input) {
        $rules = array(
            'name'                     => 'Required',
            'keywords'                  => 'string|min:2|max:255',
        );
        return Validator::make($input, $rules);
    }

    public static function pageList()
    {
        return Page::where('is_active',1)->pluck('name', 'id');
    }
}