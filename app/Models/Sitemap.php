<?php

namespace App\Models;

use App\Traits\Eventable;
use Illuminate\Database\Eloquent\Model;

class Sitemap extends Model
{
    use Eventable;

    protected $table = 'sitemaps';
    
    protected $fillable = [
        'name',
        'url',
        'last_modified',
        'order',
        'is_active',
    ];
}
