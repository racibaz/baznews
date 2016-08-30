<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Language extends Model
{
    protected $fillable = [
        'name',
        'description',
        'is_active',
    ];

}
