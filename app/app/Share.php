<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    protected $table='shares';
    protected $fillable=['user_id', 'playlist_id'];

    public function playlist()
    {
        return $this->belongsTo('App\Playlist', 'playlist_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
