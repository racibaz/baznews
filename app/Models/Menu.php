<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Menu extends Model
{

    protected $fillable = ['parent_id', 'name', 'slug', 'url', 'order', 'description', 'is_active'
    ];

    public function parent()
    {
        return $this->belongsTo('App\Models\Menu', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Menu', 'parent_id');
    }
    
    public static function validate($input)
    {
        $rules = array(
            'name' => 'Required|Between:1,255',
        );
        return Validator::make($input, $rules);
    }

}
