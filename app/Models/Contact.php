<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class Contact extends Model
{
    use SoftDeletes;

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

    protected $dates = ['created_at','updated_at','deleted_at'];

    public function contact_type()
    {
        return $this->belongsTo(ContactType::class,'contact_type_id');
    }

    public static function validate($input) {
        $rules = array(
            'contact_type_id' => 'integer',
            'full_name' => 'required|min:3|max:255',
            'subject' => 'required|min:3|max:255',
            'email' => 'required|email|max:255',
            'content' => 'required|string',
            'IP' => 'ip'
        );
        return Validator::make($input, $rules);
    }
}
