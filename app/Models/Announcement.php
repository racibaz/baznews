<?php

namespace App\Models;


use App\Traits\Eventable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class Announcement extends Model
{
    use Eventable;
    use SoftDeletes;

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

    protected $dates = ['created_at','updated_at','deleted_at'];

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    public static function validate($input) {
        $rules = array(
            'title' => 'required|max:255',
            'order' => 'integer',
        );

        return Validator::make($input, $rules);
    }
    
}
