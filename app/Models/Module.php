<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Module extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'order',
        'is_active',
    ];


    public static function validate($input) {
        $rules = array(
            'name'                    => 'required',
            'slug'                    => 'required',
        );
        return Validator::make($input, $rules);
    }

//    public static function cityList()
//    {
//        return City::where('is_active',1)->pluck('name','id');
//    }
}
