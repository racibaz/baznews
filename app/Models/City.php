<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class City extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country_id',
        'name',
        'is_active',
    ];

    public function country()
    {
        return $this->belongsTo('App\Models\Country','country_id');
    }

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public static function validate($input) {
        $rules = array(
            'country_id'                    => 'required',
            'name'                          => 'required|min:4|max:255',
        );
        return Validator::make($input, $rules);
    }

    public static function cityList()
    {
        return City::where('is_active',1)->pluck('name','id');
    }

}