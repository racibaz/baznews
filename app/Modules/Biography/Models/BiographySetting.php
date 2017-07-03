<?php

namespace App\Modules\Biography\Models;

use App\Traits\Eventable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Validator;

class BiographySetting extends Model
{
    use Eventable;

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'biography_count',
    ];

    public static function validate($input)
    {
        $rules = array(
            'biography_count' => 'integer',
        );
        return Validator::make($input, $rules);
    }
}
