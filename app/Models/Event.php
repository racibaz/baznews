<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class Event extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //TODO link alanı eklenerek listeleme formundan direk forma yollayabilir zaten id si elimizde var.
    protected $fillable = [
        'user_id',
        'eventable_id',
        'eventable_type',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function eventable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public static function validate($input)
    {
        $rules = array(
            'user_id' => 'required',
        );
        return Validator::make($input, $rules);
    }
}
