<?php

namespace App\Http\Controllers\Admin\other;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TitleRequest;
use App\Models\Sport\Lang;
use App\Models\Sport\Places;

class PlaceController extends Controller
{
    public function index()
    {
        $values = Places::withTrashed()->Lang()->toBase()->get(['code', 'name', 'deleted_at']);

        return view('admin.other.places.index', compact('values'));
    }

    public function create()
    {
        $langs = Lang::get();

        return view('admin.other.places.create', compact('langs'));
    }

    public function store(TitleRequest $request)
    {
        $code = Places::all()->pluck('code')->max() + 1;

        foreach ($request->title as $key => $value) {
            Places::create(
                [
                    'code' => $code,
                    'lang' => $key,
                    'name' => $value,
                ]
            );
        }

        return redirect()->route('admin.places.index');
    }

    public function edit(int $code)
    {
        $values = Places::whereCode($code)->get();

        return view('admin.other.places.edit', compact('values', 'code'));
    }

    public function update(TitleRequest $request, int $code)
    {
        foreach ($request->title as $key => $value) {
            Places::whereCode($code)->whereLang($key)->update(['name' => $value]);
        }

        return redirect()->route('admin.places.index');
    }

    public function destroy(int $code)
    {
        Places::whereCode($code)->delete();

        return redirect()->route('admin.places.index')->with(['success' => "Запись $code удалена."]);
    }

    public function restore(int $code)
    {
        $restored = Places::withTrashed()->whereCode($code)->restore();
        if ($restored) {
            return redirect()->route('admin.places.index')->with(['success' => "Запись $code восстановлена!"]);
        }

        return back()->withErrors(['alert' => 'Ошибка восстановления!']);
    }
}
