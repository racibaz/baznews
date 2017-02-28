<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Language extends Model
{
    protected $fillable = ['name', 'description', 'is_active'];

    //todo event ile ilişkilendirilecek.
    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
    }

    public static function validate($input) {
        $rules = array(
            'name' => 'Required',
        );
        return Validator::make($input, $rules);
    }

    public static function languageList()
    {
        return Language::where('is_active',1)->pluck('name', 'id');
    }

}
