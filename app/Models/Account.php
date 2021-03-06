<?php

namespace App\Models;

use App\Traits\Eventable;
use Request;
use Venturecraft\Revisionable\Revision;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Account extends Model
{
    use Eventable;
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
        'pinterest',
        'linkedin',
        'youtube',
        'web_site',
        'sex',
        'blood_type',
        'bio_note',
        'last_login',
        'IP',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'last_login',
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
        return $this->belongsTo(City::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function social_providers()
    {
        return $this->hasMany(SocialProvider::class);
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

    public static function getAllUsers()
    {
        return User::where('is_active', 1)->get();
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
            'password' => 'required|min:4|Confirmed',
            'password_confirmation' => 'required|min:4',
            'facebook' => 'url|nullable',
            'twitter' => 'url|nullable',
            'pinterest' => 'url|nullable',
            'linkedin' => 'url|nullable',
            'youtube' => 'url|nullable',
            'web_site' => 'url|nullable',
            'bio_note' => 'string|max:1000|nullable',
            'IP' => 'ip',
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
