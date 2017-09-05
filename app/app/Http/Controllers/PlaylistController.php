<?php

namespace App\Http\Controllers;

use App\Content;
use App\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
    public function create()
    {
      return view('create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'cat' => 'required',
            'name' => 'required|max:250',
            'desc' => 'required|max:500|min:5',

         ]);

        $userid=\Auth::id();

        if (isset($request->pic))
        {
         $m = $request->file('pic')->store('/public/playlist');
         $pic = \Storage::disk('local')->url($m);
            $new= Playlist::create([
                'name' => $request->name,
                'cat' => $request->cat,
                'pic' => $pic,
                'description' => $request->desc,
                'user_id' => $userid
            ]);
        }else
        {
            $new= Playlist::create([
                'name' => $request->name,
                'cat' => $request->cat,
                'description' => $request->desc,
                'user_id' => $userid
            ]);
        }

        $new->save();

        return redirect('/playlist/create/'.$new->id)->withFlashMessage('Add Your List.');
    }

    public function createList($id)
    {
        $find = Playlist::find($id);
        $userid=\Auth::id();
        if(count($find) > 0)
        {
            if($userid == $find->user_id)
            {
                $cat = $find->cat;
                $name = $find->name;

                return view('addlist', compact('cat', 'name'));
            }else
            {
                return redirect('/')->withFlashMessage('invalid URL :(');
            }
        }else
        {
            return redirect('/')->withFlashMessage('invalid URL :(');

        }


    }

    public function storeList($id, Request $request)
    {
        $userid=\Auth::id();
        $find = Playlist::find($id);
        if(count($find) > 0)
        {
            if($userid == $find->user_id)
            {
                $num = count($request->name);
                for($i=0; $i < $num; $i++)
                {
                   $add= Content::create([
                        'name' => $request->name[$i],
                        'url'  => $request->url[$i],
                        'playlist_id' => $id
                    ]);
                   $add->save();
                }
                return redirect('/')->withFlashMesage('Success Adding List');

                return view('addlist');
            }else
            {
                return redirect('/')->withFlashMessage('invalid URL :(');
            }
        }else
        {
            return redirect('/')->withFlashMessage('invalid URL :(');

        }
    }

    public function DeleteList($id)
    {
        $userid=\Auth::id();
        $find = Content::where('id' , $id)->with(['playlist' => function($play) use ($userid) {
            $play->where('user_id', $userid)->first();
        }])->first();

        if($find->playlist)
        {
            $find->delete();
            return "true";
        }else
        {
            return "false";
        }

    }

    public function DeletePlay($id)
    {
        $userid=Auth::id();
        $find= Playlist::where('id', $id)->where('user_id', $userid)->first();
        if($find)
        {
            $find->delete();
            return redirect()->back()->withFlashMessage('Success Delete Playlist');
        }

        return redirect()->back()->withFlashMessage('can\'t delete this playlist');
    }

    public function ShowPlay($id)
    {
        $find = Playlist::where('id', $id)->with('like', 'share', 'content', 'rate')->first();
        if ($find)
        {
            return view('show', compact('find'));
        }else
        {
           return redirect()->back()->withFlashMessage('Can\'t find this playlist !');
        }
    }

}
