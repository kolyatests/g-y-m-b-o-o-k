<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sport\MenuText;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = MenuText::Lang()->get();

        return view('admin.categories.index', compact('categories'));
    }
}
