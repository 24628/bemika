<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

/**
 * @property string name
 * @property string email
 * @property string password
 * @property string lang
 * @property string payment_id
 * @property boolean active
 * @property Carbon $email_verified_at;
*/
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'lang', 'payment_id', 'disable_payment_info',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'active'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function patient(){

        return $this->hasMany('App\Patient', 'user_id');

    }

    static public function setLanguage($lang){

        $user = User::find(Auth::id());
        $user->lang = $lang;
        $user->update();

        Session::put('applocale', $lang);

    }
}
