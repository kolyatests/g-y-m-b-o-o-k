<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class ConfigController extends Controller
{
    public function index()
    {
        $routeCollection = Route::getRoutes();

        return view('admin.config.index', compact('routeCollection'));
    }

}
