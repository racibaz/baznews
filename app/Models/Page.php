<?php

namespace App\Models;

use App\Traits\Eventable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class Page extends Model
{
    use Eventable;
    use SoftDeletes;

    protected $fillable = ['name', 'slug', 'content', 'description', 'keywords' , 'is_comment','is_active'];
    protected $dates = ['created_at','updated_at','deleted_at'];

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