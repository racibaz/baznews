<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Menu extends Model
{
    protected $fillable = ['parent_id', 'page_id', 'name', 'slug', 'url', 'icon', 'order' ,'is_active'];

    public function page()
    {
        return $this->belongsTo('App\Models\Page');
    }

    public static function validate($input) {
        $rules = array(
            'name'                     => 'Required',
        );
        return Validator::make($input, $rules);
    }
}