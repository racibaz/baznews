<?php

namespace App\Models;

use App\Traits\Eventable;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use Eventable;

    protected $fillable = ['name', 'description', 'is_active'];

    public static function languageList()
    {
        return Language::where('is_active', 1)->pluck('name', 'id');
    }
}
