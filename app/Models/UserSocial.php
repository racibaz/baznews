<?php

namespace App\Models;

use App\Traits\Eventable;
use Illuminate\Database\Eloquent\Model;

class UserSocial extends Model
{
    use Eventable;

    protected $table = 'users_social';

    protected $fillable = ['social_id', 'service'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
