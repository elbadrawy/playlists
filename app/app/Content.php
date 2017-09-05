<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table='content';
    protected $fillable=['name', 'order', 'url', 'playlist_id'];

    public function playlist()
    {
        return $this->belongsTo('App\Playlist', 'playlist_id');
    }
}
