<?php

namespace App\Models;

use App\Traits\Eventable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class City extends Model
{
    use Eventable;
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

    //todo soyutlaştırılmalı modules news
    public function news()
    {
        return $this->hasMany('App\Modules\News\Models\News');
    }

    public static function cityList()
    {
        return City::where('is_active',1)->pluck('name','id');
    }

}
