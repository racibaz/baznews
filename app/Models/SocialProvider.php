<?php

namespace App\Models;

use App\Traits\Eventable;
use Illuminate\Database\Eloquent\Model;

class SocialProvider extends Model
{
    use Eventable;

    protected  $fillable = ['provider_id','provider'];

    function user()
    {
        return $this->belongsTo(User::class);
    }
}
