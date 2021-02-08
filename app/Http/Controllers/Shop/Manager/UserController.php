<?php

namespace App\Http\Controllers\Shop\Manager;

use App\Http\Controllers\Controller;
use App\Models\Shop\UserShopProgram;

class UserController extends Controller
{
    public function index()
    {
        $users = UserShopProgram::select('user_id')
            ->where('status', [1, 2])
            ->groupBy('user_id')->with('user')
            ->get();

        return view('shop.manager.users.index', ['users' => $users]);
    }

    public function show(int $id)
    {
        $programs = UserShopProgram::whereIn('status', [1, 2])->where('user_id', $id)->with('user', 'workoutText')->get();
        $name = $programs->first()->user->name;

        return view('shop.manager.users.show', compact('name', 'programs'));
    }
}
