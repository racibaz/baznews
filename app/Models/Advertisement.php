<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class Advertisement extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'code',
        'description',
        'photo',
        'link',
        'is_active',
    ];

    protected $dates = ['created_at','updated_at','deleted_at'];


    public static function validate($input) {
        $rules = array(
            'name'                          => 'required|max:255',
            'description'                   => 'max:255',
            'photo'                         => 'image|max:255',
            'link'                          => 'url',
        );
        return Validator::make($input, $rules);
    }

    public static function advertisementList()
    {
        return Advertisement::where('is_active',1)->pluck('name','id');
    }
}
