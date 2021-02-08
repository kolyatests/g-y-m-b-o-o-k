<?php

namespace App\Http\Controllers;

class WelcomeController extends Controller
{
    public function start()
    {
        return view('welcome');
    }
}
