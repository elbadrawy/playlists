<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function addLike($id)
    {
        $userid=Auth::id();
        $find=Like::where('user_id', $userid)->where('playlist_id', $id)->get();
        if (count($find) > 0)
        {
            return "false";
        }
        $add = Like::create(['playlist_id' => $id, 'user_id' => $userid]);
        return "true";
    }
}
