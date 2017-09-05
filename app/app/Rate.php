<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $table='rates';
    protected $fillable=['user_id', 'playlist_id', 'rate'];

    public function playlist()
    {
        return $this->belongsToMany('App\Playlist', 'playlist_id');
    }

    public function user()
    {
        return $this->belongsToMany('App\User', 'user_id');
    }

}
