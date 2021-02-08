<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop\UserShopProgram;

class ProgramController extends Controller
{
    public function getProgramBasket()
    {
        $programs = UserShopProgram::where('status', 1)->UserId()->with('user')->get();

        return view('sport.myprogram.user-basket-programs', compact('programs'));
    }

    public function getPurchasedPrograms()
    {
        $programs = UserShopProgram::userId()->whereIn('status', [2, 3])->with('workoutText')->get();
        return view('sport.myprogram.user-purchased-programs', compact('programs'));
    }

    public function buyProgram($plan)
    {
        UserShopProgram::firstOrCreate(
            [
                'status' => 1,
                'user_id' => session('id'),
                'workout_plan_id' => $plan,
            ]
        );

        return redirect()->route('shop.user.pre.paid-programs');
    }

    public function checkout()
    {
        return redirect()->route('sport.main')->with(['success' => 'Заказ подтвержден, менеджер с вами свяжется.']);
    }
}
