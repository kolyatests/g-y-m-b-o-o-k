<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::withTrashed()->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreRequest $request)
    {
        $user = User::add($request->all());
        $user->generatePassword($request->password, $user);
        $user->uploadAvatar($request->file('avatar'));
        return redirect()->route('admin.users.index');
    }

    public function edit(int $id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, int $id)
    {
        $user = User::find($id);
        if ($user->role == 1) {
            return redirect()->route('admin.users.index')->with(['success' => "Запись не удалена, админ."]);
        }
        $this->validate(
            $request,
            [
                'name' => 'required',
                'email' => [
                    'required',
                    'email',
                    Rule::unique('users')->ignore($user->id),
                ],
                'avatar' => 'nullable|image',
            ]
        );
        $user->edit($request->all());
        $user->generatePassword($request->password, $user);
        $user->uploadAvatar($request->file('avatar'));
        return redirect()->route('admin.users.index');
    }

    public function destroy(int $id)
    {
        if (User::where('id', $id)->first()->role != 1) {
            User::where('id', $id)->delete();
            return redirect()->back()->withInput()->with(['success' => "Запись $id удалена."]);
        }
        return redirect()->back()->withInput()->with(['success' => "Запись не удалена, админ."]);
    }

    public function finaldestroy(int $id)
    {
        $user = User::withTrashed()->where('id', $id)->first();
        $user->removeCompletely();

        return redirect()->back()->with(['success' => "Запись $id удалена окончательно."]);
    }

    public function restore(int $id)
    {
        $restored = User::withTrashed()->find($id)->restore();
        if ($restored) {
            return redirect()->back()->with(['success' => "Запись $id восстановлена!"]);
        }
        return back()->withErrors(['alert' => 'Ошибка восстановления!']);
    }

}
