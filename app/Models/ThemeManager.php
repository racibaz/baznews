<?php

namespace App\Models;

use App\Traits\Eventable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class ThemeManager extends Model
{
    use Eventable;
    use Sluggable;

    public $table = 'modules';
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable() {
        return [
            'slug' => [
                'source' => ['name']
            ]
        ];
    }

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
            'name'                    => 'required'
        );
        return Validator::make($input, $rules);
    }

//    public static function cityList()
//    {
//        return City::where('is_active',1)->pluck('name','id');
//    }
}
