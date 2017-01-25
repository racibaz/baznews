<?php

namespace App\Models;

use Request;
use Venturecraft\Revisionable\Revision;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Account extends Model
{
    use EntrustUserTrait;
    use Notifiable;


    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_id',
        'country_id',
        'city_id',
        'name',
        'email',
        'password',
        'slug',
        'cell_phone',
        'facebook',
        'twitter',
        'linkedin',
        'youtube',
        'sex',
        'blood_type',
        'avatar',
        'bio_note',
        'IP',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    public function social_providers()
    {
        return $this->hasMany(SocialProvider::class);
    }

    public function attachments()
    {
        return $this->morphMany('App\Models\Attachment', 'attachmentable');
    }

    //modules news
    public function photo_galleries()
    {
        return $this->hasMany('App\Modules\News\Models\PhotoGallery');
    }

    //modules news
    public function video_galleries()
    {
        return $this->hasMany('App\Modules\News\Models\VideoGallery');
    }

    public static function UserFullName()
    {
        return Auth::user()->name;
    }

    public function activationToken()
    {
        return $this->hasOne(ActivationToken::class);
    }

    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
    }

    public static function getAllUsers()
    {
        return User::where('is_active',1)->get();
    }

    public static  function getUsersByGroupId($group_id){

        $group = Group::where('id',$group_id)->first();
        return $group->users;
    }


    public static function getUserRevisions($user_id)
    {
        return Revision::where('user_id',$user_id)->get();
    }

    public static function validate($input) {
        $rules = array(
            'password'                      => 'required|min:4|Confirmed',
            'password_confirmation'         => 'required|min:4',
            'avatar' => 'image|max:255',
            'bio_note'  => 'string|max:255',
            'facebook'  => 'url',
            'twitter'  => 'url',
            'linkedin'  => 'url',
            'youtube'   => 'url',
            'IP'    => 'ip',
            //todo cell_phone
            //todo email alanı kontrol edilmeli
        );

        return Validator::make($input, $rules);
    }


    public static function getUserIp()
    {
        return Request::ip();
    }

    public static function byEmail($email)
    {
        return static::where('email', $email);
    }
}
