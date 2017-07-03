<?php

namespace App\Modules\Book\Models;

use App\Traits\Eventable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class BookSetting extends Model
{
    use Eventable;

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'book_count',
    ];

    public static function validate($input)
    {
        $rules = array(
            'book_count' => 'integer',
        );
        return Validator::make($input, $rules);
    }
}
