<?php

namespace App\Models;


use App\Traits\Eventable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
