<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function redirectToProvider($provider)
    {
        if($provider == 'facebook')
        {
            return Socialite::driver('facebook')->stateless()->redirect();
        }elseif ($provider == 'twitter')
        {
            return  Socialite::driver('twitter')->redirect();

        }else
        {
            return redirect('/');
        }

    }

    public function handleProviderCallback($provider)
    {
        if($provider == 'facebook')
        {

            $user = Socialite::driver('facebook')->stateless()->user();

            $user_exist = User::where('fb_id',$user->getId())->first();

            if($user_exist){
                Auth::loginUsingId($user_exist->id);
                if(Auth::user()->username == Auth::user()->fb_id)
                {
                    return redirect('/complete');
                }else
                {
                    return redirect('/');
                }
            }else{

                $pic='http://graph.facebook.com/'.$user->getId().'/picture?type=large';

                $ema=$user->getEmail();
                $find= User::where('email', $ema)->get()->first();
                if(count($find) > 0)
                {
                    $em=$user->getId().'@facebook.com';
                    $new_user = User::create([
                        'name' => $user->getName(),
                        'email' => $em,
                        'username'	=> $user->getId(),
                        'fb_id'	=> $user->getId(),
                        'pic'	=> $pic,
                        'password' => '0'
                    ]);
                }else
                {
                    $new_user = User::create([
                        'name' => $user->getName(),
                        'email' => $user->getEmail(),
                        'username'	=> $user->getId(),
                        'fb_id'	=> $user->getId(),
                        'pic'	=> $pic,
                        'password' => '0'
                    ]);
                }
                Auth::loginUsingId($new_user->id);

                return redirect('/complete');
            }
        }elseif($provider == 'twitter')
        {
            try {
                $user = Socialite::driver('twitter')->user();
            } catch (\Exception $e) {
                return redirect('login/twitter');
            }

            $user_exist = User::where('tw_id',$user->getId())->first();

            if($user_exist){
                Auth::loginUsingId($user_exist->id);
                if(Auth::user()->username == Auth::user()->tw_id)
                {

                    return redirect('/complete');
                }else
                {
                    return redirect('/');
                }
            }else{
                $id = $user->getId();
                $email= $id.'@twitter.com';
                $username = strtolower($user->nickname);
                $name = $user->name;
                $avatar = $user->avatar_original;
                $url_exist = User::where('username', $username)->first();
                if (count($url_exist) > 0)
                {
                    $new_user = User::create([
                        'name' => $name,
                        'email' => $email,
                        'username'	=> $id,
                        'tw_id'	=> $id,
                        'pic'	=> $avatar,
                        'password' => '0',
                    ]);

                    Auth::loginUsingId($new_user->id);

                    return redirect('/complete');

                }else
                {

                    $new_user = User::create([
                        'name' => $name,
                        'email' => $email,
                        'username'	=> $username,
                        'tw_id'	=> $id,
                        'pic'	=> $avatar,
                        'password' => '0',
                    ]);

                    Auth::loginUsingId($new_user->id);
                    return redirect('/');

                }



            }

        }

    }

}
