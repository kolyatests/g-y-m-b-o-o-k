<?php

namespace App\Http\Controllers\Book\Moderator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\TitleRequest;
use App\Models\Book\BookTag;
use Str;

class TagController extends Controller
{
    public function index()
    {
        $tags = BookTag::all();

        return view('book.moderator.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('book.moderator.tags.create');
    }

    public function store(TitleRequest $request)
    {
        BookTag::create(
            [
                'title' => $request->title,
                'slug' => Str::slug($request->title, '-'),
            ]
        );

        return redirect()->route('book.moderator.tags.index');
    }

    public function edit(int $id)
    {
        $tag = BookTag::find($id);

        return view('book.moderator.tags.edit', ['tag' => $tag]);
    }

    public function update(TitleRequest $request, int $id)
    {
        $tag = BookTag::find($id);
        $tag->update(
            [
                'title' => $request->title,
                'slug' => Str::slug($request->title, '-'),
            ]
        );

        return redirect()->route('book.moderator.tags.index');
    }

    public function destroy(int $id)
    {
        BookTag::find($id)->delete();

        return redirect()->route('book.moderator.tags.index');
    }
}
