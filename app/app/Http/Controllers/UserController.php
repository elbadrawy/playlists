<?php

namespace App\Http\Controllers;

use App\Playlist;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show($name)
    {
        $find = User::with(['playlist' => function($q){
            $q->with(['rate', 'share', 'content','like'])->get();
        }, 'like' => function($qu){
            $qu->with(['playlist' => function($mm){
                $mm->with(['rate', 'share', 'content','like'])->get();
            }, 'user'])->get();
        }, 'share' => function($sh){
            $sh->with(['playlist' => function($plsh){
                $plsh->with(['rate','share', 'content','like', 'user'])->get();
            }, 'user'])->get();
        }])->where('username', $name)->get(['username', 'id', 'name', 'pic'])->first();

        if (count($find) > 0)
        {
            return view('profile', compact('find'));
        }else
        {
            return redirect('/')->withFlashMessage("No Such Username");
        }
    }

    public function complete()
    {
        return view('auth.complete');
    }

    public function updateSocialComplete(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|min:2|max:50|unique:users'
        ]);
        $id = Auth::id();
        $user = User::where('id', $id)->first();
        if($user)
        {
           $user->update(['username' => $request->username]);
        }
        $user->username = $request->username;
        return redirect('/')->withFlashMessage('Username Updated');
    }

    public function edit()
    {
        $id = Auth::id();
        $pass = User::where('id', $id)->first();
        return view('editprofile', compact('pass'));
    }

    public function update(Request $request)
    {

        $id = Auth::id();
        $user = User::where('id', $id)->first();
        $name = $request->name;
        $user->update(['name' => $request->name]);
        if($request->file('pic'))
        {
            $store = $request->file('pic')->store('public/pics');
            $pic = \Storage::drive('local')->url($store);
            $user->update(['pic' => $pic]);
        }
        if($request->password)
        {
            $this->validate($request, [
                'password' => 'required|string|min:6|confirmed',
            ]);


                $user->update(['password' => bcrypt($request->password)]);
        }

        return redirect('/user/'.$user->username)->withFlashMessage('Success editing your profile');


    }
}
