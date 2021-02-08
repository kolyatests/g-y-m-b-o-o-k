<?php

namespace App\Http\Controllers\Admin\other;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TitleRequest;
use App\Models\Sport\DescEquipment;
use App\Models\Sport\Lang;

class DescEquipmentController extends Controller
{
    public function index()
    {
        $values = DescEquipment::withTrashed()->Lang()->toBase()->get(['id', 'code', 'name', 'deleted_at']);

        return view('admin.other.desc_equipment.index', compact('values'));
    }

    public function create()
    {
        $langs = Lang::get();

        return view('admin.other.desc_equipment.create', compact('langs'));
    }

    public function store(TitleRequest $request)
    {
        $code = DescEquipment::all()->pluck('code')->max() + 1;
        foreach ($request->title as $key => $value) {
            DescEquipment::create(
                [
                    'code' => $code,
                    'lang' => $key,
                    'name' => $value,
                ]
            );
        }

        return redirect()->route('admin.desc_equipment.index');
    }

    public function edit(int $code)
    {
        $values = DescEquipment::whereCode($code)->get();

        return view('admin.other.desc_equipment.edit', compact('values', 'code'));
    }

    public function update(TitleRequest $request, int $code)
    {
        foreach ($request->title as $key => $value) {
            DescEquipment::whereCode($code)->whereLang($key)->update(['name' => $value]);
        }
        return redirect()->route('admin.desc_equipment.index');
    }

    public function finaldestroy(int $code)
    {
        DescEquipment::whereCode($code)->forceDelete();

        return redirect()->back()->with(['success' => "Запись $code удалена окончательно."]);
    }

    public function destroy(int $code)
    {
        DescEquipment::whereCode($code)->delete();

        return redirect()->back()->with(['success' => "Запись $code удалена."]);
    }

    public function restore(int $code)
    {
        $restored = DescEquipment::withTrashed()->whereCode($code)->restore();
        if ($restored) {
            return redirect()->back()->with(['success' => "Запись $code восстановлена!"]);
        }

        return back()->withErrors(['alert' => 'Ошибка восстановления!']);
    }
}
