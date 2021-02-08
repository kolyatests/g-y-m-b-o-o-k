<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Mail\VerifyEmail;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Mail;
use Session;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('register');
    }

    public function register(RegisterRequest $request)
    {
        $user = User::add($request->all());
        $user->generatePassword($request->password, $user);
        Mail::to($user)->send(new VerifyEmail($user));

        return redirect()->route('start')->with(['success' => 'Check your email and click on the link to verify.']);
    }

    public function loginForm()
    {
        return view('welcome');
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt(
            [
                'email' => $request->email,
                'password' => $request->password,
            ]
        )) {
            session(
                [
                    'id' => Auth::user()->id,
                    'lang_id' => Auth::user()->lang_id,
                    'weight_id' => Auth::user()->weight_id,
                    'unit_id' => Auth::user()->unit_id,
                    'calendar_id' => Auth::user()->calendar_id,
                ]
            );

            return redirect()->route('sport.main');
        }

        return redirect()->back()->withErrors(['alert' => 'Incorrect login or password!']);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect(route('login'));
    }

    public function verifyEmail(Request $request, $email, $user)
    {
        User::where('email', $email)->where('id', $user)
            ->update(
                [
                    'verify' => 88,
                    'email_verified_at' => now()
                ]
            );
        if (Auth::attempt(
            [
                'email' => $request->email,
                'password' => 'gymbook.com.ua',
            ]
        )) {
            session(
                [
                    'id' => Auth::user()->id,
                    'lang_id' => Auth::user()->lang_id,
                    'weight_id' => Auth::user()->weight_id,
                    'unit_id' => Auth::user()->unit_id,
                    'calendar_id' => Auth::user()->calendar_id,
                ]
            );

            return redirect()->route('sport.main');
        }

        return redirect()->back()->withErrors(['alert' => 'Incorrect login or password!']);
    }
}
