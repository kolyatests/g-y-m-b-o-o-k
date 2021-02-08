<?php

namespace App\Http\Controllers\Book;

use App\Models\Book\BookTag;
use App\Models\Book\BookPost;
use App\Models\Book\BookCategory;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index()
    {
        $posts = BookPost::paginate(5);

        return view('book.user.posts.index')->with('posts', $posts);
    }

    public function vue()
    {
        return view('book.vue.posts');
    }

    public function show(string $slug)
    {
        $post = BookPost::where('slug', $slug)->firstOrFail();
        $post->viewedCounter();

        return view('book.user.show', compact('post'));
    }

    public function tag(string $slug)
    {
        $tag = BookTag::where('slug', $slug)->firstOrFail();
        $posts = $tag->posts()->paginate(6);

        return view('book.user.list', compact('posts'));
    }

    public function category(string $slug)
    {
        $category = BookCategory::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->paginate(6);

        return view('book.user.list', compact('posts'));
    }

    public function shareTrain()
    {
        return view('book.train.calendar-share');
    }

    public function share(string $day, int $id)
    {
        $content = '<p><a href="/sport/gym_see/' . $day . '/' . $id . '">тренировка</a></p>';
        $title = 'тренировка ' . $day;
        $description = 'описание тренировки';
        $categories = BookCategory::pluck('title', 'id')->all();
        $tags = BookTag::pluck('title', 'id')->all();
        return view('book.train.create', compact('content', 'title', 'description', 'categories', 'tags'));
    }
}
