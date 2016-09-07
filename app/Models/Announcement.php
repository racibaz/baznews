<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Announcement extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'order',
        'show_time',
        'is_active'
    ];


    public function groups()
    {
        return $this->belongsToMany('App\Models\Group');
    }


    public static function validate($input) {
        $rules = array(
            'title'                    => 'required|max:255',
        );

        return Validator::make($input, $rules);
    }
    
}
