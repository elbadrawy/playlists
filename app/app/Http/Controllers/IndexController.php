<?php

namespace App\Http\Controllers;

use App\Playlist;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function newest()
    {
        $get = Playlist::orderBy('id', 'desc')->paginate(69);
        return view('index', compact('get'));
    }

    public function search(Request $request)
    {
        if($request->cat == '')
        {
            return redirect('/')->withFlashMessage('Please select Searching For ?');
        }else
        {
            if($request->by == '')
            {
                $cat = $request->cat;
               $get =  Playlist::where('cat', $cat)->orderBy('id', 'desc')->paginate(9);
               return view('index', compact('get'));

            }else
            {
                $cat = $request->cat;
                if($request->by == 0)
                {
                    //rate
                    $get = Playlist::with('rate')->where('cat' ,$cat)->RateCount()->orderBy('avg', 'desc')->paginate(9);
                    return view('index', compact('get'));

                }elseif ($request->by == 1)
                {
                    //likes
                    $get = Playlist::with('like')->where('cat' ,$cat)->LikeCount()->orderBy('count', 'desc')->paginate(9);
                    return view('index', compact('get'));

                }elseif($request->by == 2)
                {
                    //share
                    $get = Playlist::with('share')->where('cat' ,$cat)->ShareCount()->orderBy('count', 'desc')->paginate(9);
                    return view('index', compact('get'));
                }
            }
        }
    }
}
