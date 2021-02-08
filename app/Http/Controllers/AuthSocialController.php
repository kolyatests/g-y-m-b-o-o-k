<?php

namespace App\Http\Controllers;

use App\Services\SocialService;
use Auth;
use Socialite;

class AuthSocialController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = SocialService::createUser($provider);
        if(!$user){
            return redirect()->route('login')->withErrors(['alert' => session('alert')]);
        }
        $user->createUser();

        return redirect(route('sport.main'));
    }

}
