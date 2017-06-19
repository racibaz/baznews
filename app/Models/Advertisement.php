<?php

namespace App\Models;

use App\Traits\Eventable;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use Eventable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'code',
        'description',
        'is_active',
    ];

    public static function advertisementList()
    {
        return Advertisement::where('is_active',1)->pluck('name','id');
    }
}
