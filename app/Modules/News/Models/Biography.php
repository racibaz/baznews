<?php

namespace App\Modules\News\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Biography extends Model
{
    protected $table = 'biographies';
    protected $fillable = ['user_id', 'full_name', 'slug', 'content', 'photo', 'description', 'keywords', 'order', 'hit', 'is_cuff', 'is_active'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function validate($input) {
        $rules = array(
            'full_name' => 'required',
            'content' => 'required',
        );
        return Validator::make($input, $rules);
    }

    public static function biographyList()
    {
        return Biography::where('is_active',1)->pluck('full_name', 'id');
    }
}