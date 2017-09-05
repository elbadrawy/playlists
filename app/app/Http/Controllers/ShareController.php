<?php

namespace App\Http\Controllers;

use App\Rate;
use App\Share;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShareController extends Controller
{
    public function addShare($id)
    {
        $userid=Auth::id();
        $confirm = Share::where('playlist_id', $id)->where('user_id', $userid)->get();
        if (count($confirm) > 0)
        {
            return "False";
        }else
        {
            Share::create(['user_id' => $userid, 'playlist_id' => $id]);
            return "true";
        }
    }


}
