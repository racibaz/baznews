<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Tag extends Model
{
    //TODO $fillable   ALANLAR VE VİEW TARAFI DÜZENLENECEK.

    protected $fillable = [
        'taggable_id',
        'taggable_type',
        'name',
        'is_active',
    ];


    public function news()
    {
        return $this->morphedByMany('App\Modules\News\Models\News', 'taggable');
    }

    public function photos()
    {
        return $this->morphedByMany('App\Modules\News\Models\Photo', 'taggable');
    }

    public function videos()
    {
        return $this->morphedByMany('App\Modules\News\Models\Video', 'taggable');
    }


    public static function validate($input) {
        $rules = array(
            'name'                          => 'required|min:3|max:255',
        );
        return Validator::make($input, $rules);
    }
}
