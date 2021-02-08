<?php

namespace App\Http\Controllers\Book\Moderator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\Post\StoreRequest;
use App\Http\Requests\Book\Post\UpdateRequest;
use App\Models\Book\BookCategory;
use App\Models\Book\BookPost;
use App\Models\Book\BookTag;

class PostController extends Controller
{
    public function index()
    {
        $posts = BookPost::all();

        return view(' book.moderator.posts.index', compact('posts'));
    }

    public function store(StoreRequest $request)
    {
        $post = BookPost::add($request->all());
        $post->uploadImage($request->file('image'));
        $post->setCategory($request->category_id);
        $post->setTags($request->tags);
        $post->toggleStatus($request->status);
        $post->toggleFeatured($request->is_featured);

        return redirect()->route('book.moderator.posts.index');
    }

    public function edit(int $id)
    {
        $post = BookPost::find($id);
        $categories = BookCategory::pluck('title', 'id')->all();
        $tags = BookTag::pluck('title', 'id')->all();
        $selectedTags = $post->tags->pluck('id')->all();
        return view('book.moderator.posts.edit', compact('categories', 'tags', 'post', 'selectedTags'));
    }

    public function update(UpdateRequest $request, int $id)
    {
        $request['description'] = str_replace('<p>&nbsp;</p>', null, $request['description']);
        $request['content'] = str_replace('<p>&nbsp;</p>', null, $request['content']);
        $request['description'] = trim($request['description']);
        $request['content'] = trim($request['content']);
        if ($request['description'] == '') {
            $request['description'] = null;
        }
        if ($request['content'] == '') {
            $request['content'] = null;
        }

        $post = BookPost::find($id);
        $post->edit($request->all());
        $post->uploadImage($request->file('image'));
        $post->setCategory($request->category_id);
        $post->setTags($request->tags);
        $post->toggleStatus($request->status);
        $post->toggleFeatured($request->is_featured);

        return redirect()->route('book.moderator.posts.index');
    }

    public function destroy(int $id)
    {
        BookPost::find($id)->remove();

        return redirect()->route('book.moderator.posts.index');
    }
}
