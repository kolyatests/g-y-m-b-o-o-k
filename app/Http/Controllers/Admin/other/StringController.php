<?php

namespace App\Http\Controllers\Admin\other;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StringsRequest;
use App\Models\Sport\Lang;
use App\Models\Sport\Strings;

class StringController extends Controller
{
    public function index()
    {
        $values = Strings::withTrashed()->Lang()->toBase()->get(['text', 'name', 'deleted_at']);

        return view('admin.other.strings.index', compact('values'));
    }

    public function create()
    {
        $langs = Lang::get();

        return view('admin.other.strings.create', compact('langs'));
    }

    public function store(StringsRequest $request)
    {
        foreach ($request->title as $key => $value) {
            Strings::create(
                [
                    'name' => $request->name,
                    'lang' => $key,
                    'text' => $value,
                ]
            );
        }

        return redirect()->route('admin.strings.index');
    }

    public function edit(string $name)
    {
        $values = Strings::whereName($name)->get();
        return view('admin.other.strings.edit', compact('values', 'name'));
    }

    public function update(StringsRequest $request, $name)
    {
        foreach ($request->title as $key => $value) {
            Strings::where('name', $name)->whereLang($key)->update(
                [
                    'text' => $value,
                    'name' => $name,
                ]
            );
        }
        return redirect()->route('admin.strings.index');
    }

    public function destroy(int $id)
    {
        Strings::whereName($id)->delete();

        return redirect()->route('admin.strings.index')->with(['success' => "Запись $id удалена."]);
    }

    public function restore(int $id)
    {
        $restored = Strings::withTrashed()->whereName($id)->restore();
        if ($restored) {
            return redirect()->route('admin.strings.index')->with(['success' => "Запись $id восстановлена!"]);
        }

        return back()->withErrors(['alert' => 'Ошибка восстановления!']);
    }
}
