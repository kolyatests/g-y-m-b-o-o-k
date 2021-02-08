<?php

namespace App\Http\Controllers\Shop\Manager;

use App\Http\Controllers\Controller;
use App\Models\Shop\UserShopProgram;

class ProgramController extends Controller
{
    public function getOrderedPrograms()
    {
        $programs = UserShopProgram::where('status', 1)->with('user', 'workoutText')->get();
        return view('shop.manager.programs.pre-ordered-programs', compact('programs'));
    }

    public function getPaidPrograms()
    {
        $programs = UserShopProgram::where('status', 2)->get();
        return view('shop.manager.programs.purchased-programs', compact('programs'));
    }

    public function destroy(int $id)
    {
        UserShopProgram::find($id)->delete();
        return redirect()->back();
    }

    public function checkout(int $id)
    {
        UserShopProgram::find($id)->update(['status' => 2]);
        return redirect()->back();
    }

    public function unCheckout(int $id)
    {
        UserShopProgram::find($id)->update(['status' => 1]);
        return redirect()->back();
    }
}
