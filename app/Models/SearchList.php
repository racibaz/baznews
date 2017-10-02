<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SearchList extends Model
{

    public $timestamps = false;

    protected $table = 'search_lists';


    protected $fillable = [
        'class_path',
        'field',
        'module_slug',
        'route_name',
        'is_require_slug',
        'is_active'
    ];
}
