<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        return view('user.edit', compact('user'));
    }

    public function update(UpdateRequest $request)
    {
        $user = auth()->user();
        $user->update(
            [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'location' => $request->location,
                'gender' => $request->gender,
            ]
        );
        $user->generatePassword($request->password, $user);
        $user->uploadAvatar($request->file('avatar'));
        return redirect(route('profile.edit'))->with(['success' => 'Profile updated successfully']);
    }

    public function show($userName)
    {
        $user = User::where('name', $userName)->first();
        if (!$user) {
            abort(404);
        }
        return view('user.show', compact('user'));
    }

    public function loginAsUser($email, $password)
    {
        Auth::attempt(['email' => $email, 'password' => $password]);
        session([
                    'id' => Auth::user()->id,
                    'lang_id' => Auth::user()->lang_id,
                    'weight_id' => Auth::user()->weight_id,
                    'unit_id' => Auth::user()->unit_id,
                    'calendar_id' => Auth::user()->calendar_id,
                ]
        );
        return redirect()->route('sport.main');
    }
}
