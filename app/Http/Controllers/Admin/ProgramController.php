<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sport\ProgramWeek;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = ProgramWeek::withTrashed()->Lang()->get();

        return view('admin.programs.index', compact('programs'));
    }

    public function destroy(int $id)
    {
        ProgramWeek::where('program_week_id', $id)->delete();

        return redirect()->back()->with(['success' => "Запись $id удалена."]);
    }

    public function finaldestroy(int $id)
    {
        $programWeek = ProgramWeek::withTrashed()->where('program_week_id', $id)->first();
        $programWeek->deleteCompletely($id);

        return redirect()->back()->with(['success' => "Запись $id удалена окончательно."]);
    }

    public function restore(int $id)
    {
        $restored = ProgramWeek::withTrashed()->where('program_week_id', $id)->restore();
        if ($restored) {
            return redirect()->back()->with(['success' => "Запись $id восстановлена!"]);
        }

        return back()->withErrors(['alert' => 'Ошибка восстановления!']);
    }
}
