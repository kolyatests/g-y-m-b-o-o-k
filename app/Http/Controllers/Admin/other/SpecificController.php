<?php

namespace App\Http\Controllers\Admin\other;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TitleRequest;
use App\Models\Sport\Lang;
use App\Models\Sport\Specific;

class SpecificController extends Controller
{
    public function index()
    {
        $values = Specific::withTrashed()->Lang()->toBase()->get(['code', 'name', 'deleted_at']);

        return view('admin.other.specifics.index', compact('values'));
    }

    public function create()
    {
        $langs = Lang::get();

        return view('admin.other.specifics.create', compact('langs'));
    }

    public function store(TitleRequest $request)
    {
        $code = Specific::all()->pluck('code')->max() + 1;

        foreach ($request->title as $key => $value) {
            Specific::create(
                [
                    'code' => $code,
                    'lang' => $key,
                    'name' => $value,
                ]
            );
        }

        return redirect()->route('admin.specifics.index');
    }

    public function edit(int $code)
    {
        $values = Specific::whereCode($code)->get();

        return view('admin.other.specifics.edit', compact('values', 'code'));
    }

    public function update(TitleRequest $request, int $code)
    {
        foreach ($request->title as $key => $value) {
            Specific::whereCode($code)->whereLang($key)->update(['name' => $value]);
        }

        return redirect()->route('admin.specifics.index');
    }

    public function destroy(int $code)
    {
        Specific::whereCode($code)->delete();

        return redirect()->route('admin.specifics.index')->with(['success' => "Запись $code удалена."]);
    }

    public function restore(int $code)
    {
        $restored = Specific::withTrashed()->whereCode($code)->restore();
        if ($restored) {
            return redirect()->route('admin.specifics.index')->with(['success' => "Запись $code восстановлена!"]);
        }

        return back()->withErrors(['alert' => 'Ошибка восстановления!']);
    }
}
