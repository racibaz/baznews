<?php

namespace App\Models;

use App\Traits\Eventable;
use Illuminate\Database\Eloquent\Model;

class Rss extends Model
{
    use Eventable;

    protected $table = 'rss';

    protected $fillable = [
        'name',
        'url',
        'order',
        'is_active',
    ];
}
