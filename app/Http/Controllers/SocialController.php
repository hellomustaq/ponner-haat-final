<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Auth;
use App\User;



class SocialController extends Controller
{
    public function redirect($provider)
    {
     return Socialite::driver($provider)->redirect();
    }

    public function redirect1($provider)
    {
     return Socialite::driver($provider)->redirectUrl('http://localhost:8000/checkout')->redirect();
    }

    public function Callback($provider){
        $userSocial =   Socialite::driver($provider)->stateless()->user();
        $users       =   User::where(['email' => $userSocial->getEmail()])->first();
		if($users){
            Auth::login($users);
            return redirect('/');
        }
		else{
		$user = User::create([
		                'name'          => $userSocial->getName(),
		                'email'         => $userSocial->getEmail(),
		                'image'         => $userSocial->getAvatar(),
		                'provider_id'   => $userSocial->getId(),
		                'provider'      => $provider,
		            ]);
		    Auth::login($user);
	        return redirect('/');
		}
	}

	public function Callback1($provider){
        $userSocial =   Socialite::driver($provider)->stateless()->user();
        $users       =   User::where(['email' => $userSocial->getEmail()])->first();
		if($users){
            Auth::login($users);
            return redirect('/checkout');
        }
		else{
		$user = User::create([
		                'name'          => $userSocial->getName(),
		                'email'         => $userSocial->getEmail(),
		                'image'         => $userSocial->getAvatar(),
		                'provider_id'   => $userSocial->getId(),
		                'provider'      => $provider,
		            ]);
		    Auth::login($user);
	        return redirect('/checkout');
		}
	}
}
