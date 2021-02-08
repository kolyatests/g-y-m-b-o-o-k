<?php

namespace App\Http\Controllers\Admin\other;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TitleRequest;
use App\Models\Sport\Genders;
use App\Models\Sport\Lang;

class GenderController extends Controller
{
    public function index()
    {
        $values = Genders::withTrashed()->Lang()->toBase()->get(['code', 'name', 'deleted_at']);

        return view('admin.other.genders.index', compact('values'));
    }

    public function create()
    {
        $langs = Lang::get();

        return view('admin.other.genders.create', compact('langs'));
    }

    public function store(TitleRequest $request)
    {
        $code = Genders::all()->pluck('code')->max() + 1;

        foreach ($request->title as $key => $value) {
            Genders::create(
                [
                    'code' => $code,
                    'lang' => $key,
                    'name' => $value,
                ]
            );
        }

        return redirect()->route('admin.genders.index');
    }

    public function edit(int $code)
    {
        $values = Genders::whereCode($code)->get();

        return view('admin.other.genders.edit', compact('values', 'code'));
    }

    public function update(TitleRequest $request, int $code)
    {
        foreach ($request->title as $key => $value) {
            Genders::whereCode($code)->whereLang($key)->update(['name' => $value]);
        }

        return redirect()->route('admin.genders.index');
    }

    public function destroy(int $code)
    {
        Genders::whereCode($code)->delete();

        return redirect()->route('admin.genders.index')->with(['success' => "Запись $code удалена."]);
    }

    public function restore(int $code)
    {
        $restored = Genders::withTrashed()->whereCode($code)->restore();
        if ($restored) {
            return redirect()->route('admin.genders.index')->with(['success' => "Запись $code восстановлена!"]);
        }

        return back()->withErrors(['alert' => 'Ошибка восстановления!']);
    }
}
