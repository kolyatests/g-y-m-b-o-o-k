<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;

class FriendController extends Controller
{
    public function getIndex()
    {
        return view(
            'book.user.friends.index',
            [
                'friends' => auth()->user()->friends(),
                'requests' => auth()->user()->friendRequests(),
            ]
        );
    }

    public function getAdd($userName)
    {
        $user = User::where('name', $userName)->first();
        if (!$user) {
            return redirect()->route('book.friend.index')->with('info', 'Пользователь не найден!');
        }
        if (Auth::id() === $user->id) {
            return redirect()->route('book.friend.index');
        }
        if (auth()->user()->hasFriendRequestPending($user) || $user->hasFriendRequestPending(auth()->user())) {
            return redirect()->route('profile.show', $user->name)->with('info', 'Пользователю отправлен запрос в друзья.');
        }
        if (auth()->user()->isFriendWith($user)) {
            return redirect()->route('profile.show', $user->name)->with('info', 'Пользователь уже в друзьях.');
        }
        auth()->user()->addFriend($user);

        return redirect()->route('profile.show', $userName)->with('info', 'Пользователю отправлен запрос в друзья.');
    }

    public function getAccept($userName)
    {
        $user = User::where('name', $userName)->first();
        if (!$user) {
            return redirect()->route('book.friend.index')->with('info', 'Пользователь не найден!');
        }
        if (!auth()->user()->hasFriendRequestReceived($user)) {
            return redirect()->route('book.friend.index');
        }
        auth()->user()->acceptFriendRequest($user);

        return redirect()->route('profile.show', $userName)->with('info', 'Запрос в друзья принят.');
    }

    public function postDelete($userName)
    {
        $user = User::where('name', $userName)->first();
        if (!auth()->user()->isFriendWith($user)) {
            return redirect()->back();
        }
        auth()->user()->deleteFriend($user);

        return redirect()->back()->with('info', 'Удален из друзей.');
    }
}
