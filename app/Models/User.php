<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scheduledSms()
    {
        return $this->hasMany('App\ScheduledSms');
    }

    /**
     *  Change API Token With random Token
     * @return User
     */
    public function ResetToken(){
        $this->api_token = Str::random(80);
        return $this;
    }


    /**
     *  get User With Api Token
     * @param $Token
     * @return mixed
     */
    public static function getWithToken($Token){
         return User::where('api_token' ,'=',$Token)->first();

    }
}
