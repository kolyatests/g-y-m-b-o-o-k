<?php

namespace App\Services;

use App\Models\User;
use Arr;
use Session;
use Socialite;
use Storage;
use Str;

class SocialService
{
    public static function createUser($provider)
    {
        switch ($provider) {
            case "google" :
                $userSocial = Socialite::driver($provider)->user();
                $authUser = User::where('provider_id', $userSocial->id)->first();
                if ($authUser) {
                    return $authUser;
                }
                $url = $userSocial->getAvatar();
                $contents = file_get_contents($url);
                $filename = Str::random(10) . '.' . explode('/', get_headers($url, 1)["Content-Type"])[1];
                Storage::put('uploads/' . $filename, $contents);

                $message = ['email' => $userSocial->getEmail()];
                $validator = \Validator::make($message, ['email' => 'unique:users']);
                if ($validator->fails()) {
                    Session::flush();
                    session(['alert' => $validator->messages()->get('email')[0]]);
                    break;
                }
                return User::create(
                    [
                        'name' => $userSocial->getName(),
                        'email' => $userSocial->getEmail(),
                        'provider' => $provider,
                        'provider_id' => $userSocial->getId(),
                        'first_name' => Arr::get($userSocial, 'given_name'),
                        'last_name' => Arr::get($userSocial, 'family_name'),
                        'avatar' => $filename,
                        'verify' => 88,
                    ]
                );
                break;

            case "facebook" :
                $userSocial = Socialite::driver($provider)->user();
                $authUser = User::where('provider_id', $userSocial->id)->first();
                if ($authUser) {
                    return $authUser;
                }
                $url = $userSocial->avatar_original;
                $contents = file_get_contents($url);
                $filename = Str::random(10) . '.' . explode('/', ((get_headers($url, 1)["Content-Type"])[0]))[1];
                Storage::put('uploads/' . $filename, $contents);
                $message = ['email' => $userSocial->getEmail()];
                $validator = \Validator::make($message, ['email' => 'unique:users']);
                if ($validator->fails()) {
                    Session::flush();
                    session(['alert' => $validator->messages()->get('email')[0]]);
                    break;
                }

                return User::create(
                    [
                        'name' => $userSocial->getName(),
                        'email' => $userSocial->getEmail(),
                        'provider' => $provider,
                        'provider_id' => $userSocial->getId(),
                        'avatar' => $filename,
                        'verify' => 88,
                    ]
                );
                break;

            case "github" :
                $userSocial = Socialite::driver($provider)->user();
                $authUser = User::where('provider_id', $userSocial->id)->first();
                if ($authUser) {
                    return $authUser;
                }
                $url = $userSocial->getAvatar();
                $contents = file_get_contents($url);
                $filename = Str::random(10) . '.' . explode('/', get_headers($url, 1)["Content-Type"])[1];
                Storage::put('uploads/' . $filename, $contents);

                $message = ['email' => $userSocial->getEmail()];
                $validator = \Validator::make($message, ['email' => 'unique:users']);
                if ($validator->fails()) {
                    Session::flush();
                    session(['alert' => $validator->messages()->get('email')[0]]);
                    break;
                }

                return User::create(
                    [
                        'name' => $userSocial->getNickname(),
                        'email' => $userSocial->getEmail(),
                        'provider' => $provider,
                        'provider_id' => $userSocial->getId(),
                        'avatar' => $filename,
                        'verify' => 88,
                    ]
                );
                break;
        }
    }

}
