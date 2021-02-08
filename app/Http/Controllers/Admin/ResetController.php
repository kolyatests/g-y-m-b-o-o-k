<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class ResetController extends Controller
{
    public function reset()
    {
        Artisan::call('migrate:fresh --seed');
        session()->flash('success', __('main.project_reset'));

        return redirect()->route('sport.main');
    }

    public function downApp()
    {
        Artisan::call(' down --secret="657546754745845847"');

        return redirect()->route('sport.main');
    }


    public function upApp()
    {
        Artisan::call('up');

        return redirect()->route('sport.main');
    }


}
