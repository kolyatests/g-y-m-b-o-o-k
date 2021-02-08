<?php

namespace App\Http\Controllers\Admin\other;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TitleRequest;
use App\Models\Sport\Lang;
use App\Models\Sport\Muscles;

class MuscleController extends Controller
{
    public function index()
    {
        $values = Muscles::withTrashed()->Lang()->toBase()->get(['code', 'name', 'deleted_at']);

        return view('admin.other.muscles.index', compact('values'));
    }

    public function create()
    {
        $langs = Lang::get();

        return view('admin.other.muscles.create', compact('langs'));
    }

    public function store(TitleRequest $request)
    {
        $code = Muscles::all()->pluck('code')->max() + 1;

        foreach ($request->title as $key => $value) {
            Muscles::create(
                [
                    'code' => $code,
                    'lang' => $key,
                    'name' => $value,
                ]
            );
        }

        return redirect()->route('admin.muscles.index')->with(['success' => 'Успешно сохранено']);
    }

    public function edit(int $id)
    {
        $values = Muscles::whereCode($id)->get();

        return view('admin.other.muscles.edit', compact('values', 'id'));
    }

    public function update(TitleRequest $request, int $code)
    {
        foreach ($request->title as $key => $value) {
            Muscles::whereCode($code)->whereLang($key)->update(['name' => $value]);
        }

        return redirect()->route('admin.muscles.index');
    }

    public function destroy(int $id)
    {
        Muscles::whereCode($id)->delete();

        return redirect()->route('admin.muscles.index')->with(['success' => "Запись $id удалена."]);
    }

    public function restore(int $id)
    {
        $restored = Muscles::withTrashed()->whereCode($id)->restore();
        if ($restored) {
            return redirect()->route('admin.muscles.index')->with(['success' => "Запись $id восстановлена!"]);
        }

        return back()->withErrors(['alert' => 'Ошибка восстановления!']);
    }
}
