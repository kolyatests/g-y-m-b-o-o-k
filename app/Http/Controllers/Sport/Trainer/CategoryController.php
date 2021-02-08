<?php

namespace App\Http\Controllers\Sport\Trainer;

use App\Http\Controllers\Controller;
use App\Models\Sport\MenuText;

class CategoryController extends Controller//
{
    public function index()//
    {
        session(['id' => auth()->id()]);
        $categories = MenuText::Lang()->get();

        return view('sport.trainer.categories.index', compact('categories'));
    }
}
