<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Country extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'is_active',
    ];

    public function cities()
    {
        return $this->hasMany('App\City');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public static function validate($input) {
        $rules = array(
            'name'                          => 'required|min:4|max:255',
        );
        return Validator::make($input, $rules);
    }

    public static function countryList()
    {
        return Country::where('is_active',1)->lists('name','id');
    }



}
