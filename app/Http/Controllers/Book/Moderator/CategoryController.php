<?php

namespace App\Http\Controllers\Book\Moderator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\TitleRequest;
use App\Models\Book\BookCategory;
use Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = BookCategory::all();

        return view('book.moderator.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('book.moderator.categories.create');
    }

    public function store(TitleRequest $request)
    {
        BookCategory::create(
            [
                'title' => $request->title,
                'slug' => Str::slug($request->title, '-'),
            ]
        );

        return redirect()->route('book.moderator.categories.index');
    }

    public function edit(int $id)
    {
        $category = BookCategory::find($id);

        return view('book.moderator.categories.edit', compact('category'));
    }

    public function update(TitleRequest $request, int $id)
    {
        $category = BookCategory::find($id);
        $category->update(
            [
                'title' => $request->title,
                'slug' => Str::slug($request->title, '-'),
            ]
        );

        return redirect()->route('book.moderator.categories.index');
    }

    public function destroy(int $id)
    {
        BookCategory::find($id)->delete();

        return redirect()->route('book.moderator.categories.index');
    }
}
