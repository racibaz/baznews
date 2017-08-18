<?php

namespace App\Models;

use App\Events\UserRegistered;
use App\Modules\Biography\Models\Biography;
use App\Modules\Book\Models\Book;
use App\Modules\News\Models\RecommendationNews;
use App\Traits\Eventable;
use Cache;
use Cocur\Slugify\Slugify;
use Config;
use Cviebrock\EloquentSluggable\Sluggable;
use Laravel\Passport\HasApiTokens;
use Venturecraft\Revisionable\Revision;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class User extends Authenticatable
{
    use Eventable;
    use Notifiable;
    use Sluggable;
    use HasApiTokens;

    /*trait error solved
     *
     * http://stackoverflow.com/questions/25064470/collisions-with-other-trait-methods
     * https://github.com/Zizaco/entrust/issues/428
     * https://github.com/Zizaco/entrust/issues/480
     *
     * */

    use SoftDeletes, EntrustUserTrait {

        SoftDeletes::restore as sfRestore;
        EntrustUserTrait::restore as euRestore;

    }

    public function restore()
    {
        $this->sfRestore();
        Cache::tags(Config::get('entrust.role_user_table'))->flush();
    }


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['name']
            ]
        ];
    }


    public function customizeSlugEngine(Slugify $engine, $attribute)
    {
        return $engine->activateRuleset('turkish');
    }

    public static function boot()
    {
        parent::boot();

        static::created(function ($user) {

            switch (Cache::tags('Setting')->get('user_registration_type'))
            {
                case Setting::PUBLIC:
                    $user->update(['status' => User::ACTIVE]);
                    break;
                case Setting::PRIVATE:
                    $user->update(['status' => User::PASSIVE]);
                    break;
                case Setting::VERIFIED:
                    $user->update(['status' => User::PREPARING_EMAIL_ACTIVATION]);
                    break;
                case Setting::NONE:
                    $user->update(['status' => User::GARBAGE]);
                    break;
            }

            if ($user->status == User::PREPARING_EMAIL_ACTIVATION) {
                $token = $user->activationToken()->create([
                    'token' => str_random(128),
                ]);

                event(new UserRegistered($user));
            }
        });
    }

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
        'pinterest',
        'linkedin',
        'youtube',
        'web_site',
        'sex',
        'avatar',
        'bio_note',
        'IP',
        'last_login',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    public const PASSIVE = 0, ACTIVE = 1, PREPARING_EMAIL_ACTIVATION = 2, GARBAGE = 3;
    public static $statuses = ['Passive', 'Active', 'Preparing Email Activation', 'Garbage'];

    public function groups()
    {
        //return $this->belongsToMany('App\Group');
        return $this->belongsToMany('App\Models\Group');
    }

    public function roles()
    {
        //return $this->belongsToMany('App\Role');
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function social()
    {
        return $this->hasMany(UserSocial::class);
    }

    public function hasSocialLinked($service)
    {
        return (bool)$this->social->where('service', $service)->count();
    }

    //todo modules news
    public function photo_galleries()
    {
        return $this->hasMany('App\Modules\News\Models\PhotoGallery');
    }

    //todo modules news
    public function video_galleries()
    {
        return $this->hasMany('App\Modules\News\Models\VideoGallery');
    }

    public static function userList()
    {
        return User::where('status', 1)->pluck('name', 'id');
    }

    public function recommendation_news()
    {
        return $this->hasMany(RecommendationNews::class);
    }

    public function biographies()
    {
        return $this->hasMany(Biography::class);
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function activationToken()
    {
        return $this->hasOne(ActivationToken::class);
    }

    public static function getAllUsers()
    {
        return User::where('status', 1)->get();
    }

    public static function getUsersByGroupId($group_id)
    {

        $group = Group::where('id', $group_id)->first();
        return $group->users;
    }


    public static function getUserRevisions($user_id)
    {
        return Revision::where('user_id', $user_id)->get();
    }

    public static function validate($input)
    {
        $rules = array(
            'name' => 'required|max:255',
            'email' => 'required|Between:3,64|email|Unique:users',
            'password' => 'required|min:4|Confirmed',
            'password_confirmation' => 'required|min:4',
            'web_site' => 'url',
            'bio_note' => 'string',
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

    public static function getUserAvatar($email, $size = 40): string
    {
        $default = asset('img/default_user_avatar.jpg');
        return "https://www.gravatar.com/avatar/" . md5(strtolower(trim($email))) . "?d=" . urlencode($default) . "&s=" . $size;
    }

}
