<?php

namespace App\Http\Controllers\Admin\other;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TitleRequest;
use App\Models\Sport\Lang;
use App\Models\Sport\Purpose;

class PurposeController extends Controller
{
    public function index()
    {
        $values = Purpose::withTrashed()->Lang()->toBase()->get(['code', 'name', 'deleted_at']);

        return view('admin.other.purposes.index', compact('values'));
    }

    public function create()
    {
        $langs = Lang::get();

        return view('admin.other.purposes.create', compact('langs'));
    }

    public function store(TitleRequest $request)
    {
        $code = Purpose::all()->pluck('code')->max() + 1;

        foreach ($request->title as $key => $value) {
            Purpose::create(
                [
                    'code' => $code,
                    'lang' => $key,
                    'name' => $value,
                ]
            );
        }

        return redirect()->route('admin.purposes.index');
    }

    public function edit(int $code)
    {
        $values = Purpose::whereCode($code)->get();

        return view('admin.other.purposes.edit', compact('values', 'code'));
    }

    public function update(TitleRequest $request, int $code)
    {
        foreach ($request->title as $key => $value) {
            Purpose::whereCode($code)->whereLang($key)->update(['name' => $value]);
        }

        return redirect()->route('admin.purposes.index');
    }

    public function destroy(int $code)
    {
        Purpose::whereCode($code)->delete();

        return redirect()->route('admin.purposes.index')->with(['success' => "Запись $code удалена."]);
    }

    public function restore(int $code)
    {
        $restored = Purpose::withTrashed()->whereCode($code)->restore();
        if ($restored) {
            return redirect()->route('admin.purposes.index')->with(['success' => "Запись $code восстановлена!"]);
        }

        return back()->withErrors(['alert' => 'Ошибка восстановления!']);
    }
}
