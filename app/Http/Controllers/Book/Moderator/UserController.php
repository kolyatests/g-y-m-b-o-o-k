<?php

namespace App\Http\Controllers\Book\Moderator;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('id', '>', 5)->get();

        return view('book.moderator.users.index', ['users' => $users]);
    }

    public function edit(int $id)
    {
        $user = User::find($id);

        return view('book.moderator.users.edit', compact('user'));
    }

    public function update(Request $request, int $id)
    {
        $user = User::find($id);
        $user->editBan($request->all());

        return redirect()->route('book.moderator.users.index');
    }
}
