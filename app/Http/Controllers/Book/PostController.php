<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\Post\UpdateRequest;
use App\Models\Book\BookCategory;
use App\Models\Book\BookPost;
use App\Models\Book\BookTag;

class PostController extends Controller
{
    public function index()
    {
        $posts = BookPost::where('user_id', session('id'))->paginate(5);

        return view('book.user.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = BookCategory::pluck('title', 'id')->all();
        $tags = BookTag::pluck('title', 'id')->all();

        return view('book.user.posts.create', compact('categories', 'tags'));
    }

    public function store(UpdateRequest $request)
    {
        $post = BookPost::add($request->all());
        $post->uploadImage($request->file('image'));
        $post->setCategory($request->category_id);
        $post->setTags($request->tags);
        $post->toggleStatus($request->status);
        $post->toggleFeatured($request->is_featured);

        return redirect()->route('book.posts.index');
    }

    public function edit(int $id)
    {
        $post = BookPost::find($id);
        $user = auth()->user();
        $categories = BookCategory::pluck('title', 'id')->all();
        $tags = BookTag::pluck('title', 'id')->all();
        $selectedTags = $post->tags->pluck('id')->all();

        return view('book.user.posts.edit', compact('categories', 'tags', 'post', 'selectedTags', 'user'));
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

        return redirect()->route('book.posts.index');
    }

    public function destroy(int $id)
    {
        BookPost::find($id)->remove();

        return redirect()->route('book.posts.index')->with(['success' => 'Запись удалена.']);
    }

    public function getLike(int $id)
    {
        $post = BookPost::find($id);
        if (!$post) {
            redirect()->back();
        }
        if (!auth()->user()->isFriendWith($post->user)) {
            return redirect()->back();
        }
        if (auth()->user()->hasLikedPost($post)) {
            return redirect()->back();
        }
        $post->likes()->create(['user_id' => auth()->id()]);

        return redirect()->back();
    }
}
