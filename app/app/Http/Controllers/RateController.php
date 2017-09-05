<?php

namespace App\Http\Controllers;

use App\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RateController extends Controller
{
    public function GetRate($id)
    {
        $r=Rate::where('playlist_id', $id)->get();
        $avg = $r->avg('rate');
        if($avg == null)
        {
            $avg = 0;
        }

        return $avg;

    }

    public function SetRate($id, Request $request)
    {
        $userid=Auth::id();
        $set = Rate::where('user_id',$userid)->where('playlist_id', $id)->get();
        if(count($set) > 0)
        {
            Rate::where('user_id',$userid)->where('playlist_id', $id)->update(['rate' => $request->rating]);
            return "true";
        }else
        {
            Rate::create(['playlist_id' => $id, 'user_id' => $userid, 'rate' => $request->rating]);
            return "true";
        }
    }
}
