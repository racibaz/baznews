<?php

namespace App\Modules\News\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class PostCategory extends Model
{
    protected $fillable = ['parent_id','name','slug','description','keywords','hit','icon','is_cuff','is_active'];
    
    public static function validate($input) {
        $rules = array(
            'name'=> 'Required',
            'keywords'=> 'string|min:2|max:255',
        );
        return Validator::make($input, $rules);
    }
}