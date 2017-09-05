<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','username', 'password','fb_id','tw_id','pic'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function playlist()
    {
       return $this->hasMany('App\Playlist', 'user_id');
    }
    public function like()
    {
        return $this->hasMany('App\Like', 'user_id');
    }


    public function share()
    {
        return $this->hasMany('App\Share', 'user_id');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name']= strtolower($value);
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
