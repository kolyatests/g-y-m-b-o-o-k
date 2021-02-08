<?php

namespace App\Http\Controllers\Admin\other;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TitleRequest;
use App\Models\Sport\Equipment;
use App\Models\Sport\Lang;

class EquipmentController extends Controller
{
    public function index()
    {
        $values = Equipment::withTrashed()->Lang()->toBase()->get(['code', 'name', 'deleted_at']);

        return view('admin.other.equipment.index', compact('values'));
    }

    public function create()
    {
        $langs = Lang::get();

        return view('admin.other.equipment.create', compact('langs'));
    }

    public function store(TitleRequest $request)
    {
        $code = Equipment::all()->pluck('code')->max() + 1;
        foreach ($request->title as $key => $value) {
            Equipment::create(
                [
                    'code' => $code,
                    'lang' => $key,
                    'name' => $value,
                ]
            );
        }

        return redirect()->route('admin.equipment.index');
    }

    public function edit(int $code)
    {
        $values = Equipment::whereCode($code)->get();

        return view('admin.other.equipment.edit', compact('values', 'code'));
    }

    public function update(TitleRequest $request, int $code)
    {
        foreach ($request->title as $key => $value) {
            Equipment::whereCode($code)->whereLang($key)->update(['name' => $value]);
        }

        return redirect()->route('admin.equipment.index');
    }

    public function destroy(int $code)
    {
        Equipment::whereCode($code)->delete();

        return redirect()->route('admin.equipment.index')->with(['success' => "Запись $code удалена."]);
    }

    public function restore(int $code)
    {
        $restored = Equipment::withTrashed()->whereCode($code)->restore();
        if ($restored) {
            return redirect()->route('admin.equipment.index')->with(['success' => "Запись $code восстановлена!"]);
        }

        return back()->withErrors(['alert' => 'Ошибка восстановления!']);
    }
}
