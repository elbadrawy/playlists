<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $table='playlists';
    protected $fillable=['name', 'description','cat','pic', 'user_id'];

    public function user()
    {
       return $this->belongsTo('App\User', 'user_id');
    }

    public function like()
    {
        return $this->hasMany('App\like', 'playlist_id');
    }

    public function content()
    {
        return $this->hasMany('App\Content');
    }

    public function share()
    {
        return $this->hasMany('App\Share', 'playlist_id');
    }

    public function rate()
    {
        return $this->hasMany('App\Rate', 'playlist_id');
    }

    public function scopeShareCount($query)
    {
        return $query
            ->join('shares', 'shares.playlist_id', '=', 'playlists.id')
            ->selectRaw('playlists.*, count(shares.id) as count')
            ->groupBy('playlists.id');
    }

    public function scopeLikeCount($query)
    {
        return $query
            ->join('likes', 'likes.playlist_id', '=', 'playlists.id')
            ->selectRaw('playlists.*, count(likes.id) as count')
            ->groupBy('playlists.id');
    }

    public function scopeRateCount($query)
    {
        return $query
            ->join('rates', 'rates.playlist_id', '=', 'playlists.id')
            ->selectRaw('playlists.*, avg(rates.rate) as avg')
            ->groupBy('playlists.id');
    }
}
