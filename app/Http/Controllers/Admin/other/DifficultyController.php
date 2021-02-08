<?php

namespace App\Http\Controllers\Admin\other;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TitleRequest;
use App\Models\Sport\Difficulty;
use App\Models\Sport\Lang;

class DifficultyController extends Controller
{
    public function index()
    {
        $values = Difficulty::withTrashed()->Lang()->toBase()->get(['code', 'name', 'deleted_at']);

        return view('admin.other.difficulties.index', compact('values'));
    }

    public function create()
    {
        $langs = Lang::get();

        return view('admin.other.difficulties.create', compact('langs'));
    }

    public function store(TitleRequest $request)
    {
        $code = Difficulty::all()->pluck('code')->max() + 1;
        foreach ($request->title as $key => $value) {
            Difficulty::create(
                [
                    'code' => $code,
                    'lang' => $key,
                    'name' => $value,
                ]
            );
        }

        return redirect()->route('admin.difficulties.index');
    }

    public function edit(int $code)
    {
        $values = Difficulty::whereCode($code)->get();

        return view('admin.other.difficulties.edit', compact('values', 'code'));
    }

    public function update(TitleRequest $request, int $code)
    {
        foreach ($request->title as $key => $value) {
            Difficulty::whereCode($code)->whereLang($key)->update(['name' => $value]);
        }

        return redirect()->route('admin.difficulties.index');
    }

    public function destroy(int $code)
    {
        Difficulty::whereCode($code)->delete();

        return redirect()->route('admin.difficulties.index')->with(['success' => "Запись $code удалена."]);
    }

    public function restore(int $code)
    {
        $restored = Difficulty::withTrashed()->whereCode($code)->restore();
        if ($restored) {
            return redirect()->route('admin.difficulties.index')->with(['success' => "Запись $code восстановлена!"]);
        }

        return back()->withErrors(['alert' => 'Ошибка восстановления!']);
    }
}
