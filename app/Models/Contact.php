<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Contact extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'contact_type_id',
        'full_name',
        'subject',
        'content',
        'email',
        'phone',
        'is_read',
        'IP',
        'status',
    ];

    public function contact_type()
    {
        return $this->belongsTo('App\Models\ContactType','contact_type_id');
    }

    public static function validate($input) {
        $rules = array(
            'contact_type_id'                  => 'integer',
            'subject'                          => 'required|min:3|max:255',
            'email'                            => 'required|email',
            'content'                          => 'required|string',
            'IP'                               => 'ip'
        );
        return Validator::make($input, $rules);
    }
}
