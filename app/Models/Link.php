<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Link extends Model
{
    protected $fillable = [
        'url',
        'linkable_id',
        'linkable_type',
    ];


    /**
     * Get all of the owning linkable models.
     */
    public function linkable()
    {
        return $this->morphTo();
    }

    public static function validate($input) {
        $rules = array(
            'url' => 'required|max:255'
        );
        return Validator::make($input, $rules);
    }
}
