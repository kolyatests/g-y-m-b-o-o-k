<?php

namespace App\Http\Controllers\Book\Api;

use Auth;
use App\Models\User;
use App\Models\Book\BookTag;
use Illuminate\Http\Request;
use App\Models\Book\BookPost;
use App\Models\Book\BookComment;
use App\Models\Book\BookCategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\Items\BookPostsCollection;

class PostController extends Controller
{
    public function posts()
    {
        $posts = BookPost::latest()->paginate(5);

        return response(BookPostsCollection::make($posts));
    }

    public function myPosts()
    {
        $posts = BookPost::where('user_id', session('id'))->orderByDesc('created_at')->paginate(5);

        return response(BookPostsCollection::make($posts));
    }

    public function popularPosts()
    {
        $posts = BookPost::orderBy('views', 'desc')->paginate(5);

        return response(BookPostsCollection::make($posts));
    }

    public function featuredPosts()
    {
        $posts = BookPost::where('is_featured', 1)->orderBy('date', 'desc')->paginate(5);

        return response(BookPostsCollection::make($posts));
    }

    public function post($postSlug)
    {
        $user = User::first();
        $post = BookPost::where('slug', $postSlug)->first();
        $post->viewedCounter();

        return $post;
    }

    public function category($categorySlug)
    {
        if (BookCategory::where('slug', $categorySlug)->first()) {
            $posts = BookPost::where('category_id', BookCategory::where('slug', $categorySlug)->first()->id)
                ->orderByDesc('created_at')
                ->paginate(5);

            return response(BookPostsCollection::make($posts));
        }
    }

    public function tag($tagSlug)
    {
        if (BookTag::where('slug', $tagSlug)->first()) {
            $posts = BookTag::where('slug', $tagSlug)->first()->posts()->latest()->paginate(5);

            return response(BookPostsCollection::make($posts));
        }
    }

    public function sidebar()
    {
        $posts = [
            'popularPosts' => BookPost::getPopularPosts(),
            'featuredPosts' => BookPost::where('is_featured', 1)->orderBy('date', 'desc')->take(3)->get(),
            'categories' => BookCategory::withCount('posts')->get(),
        ];

        return $posts;
    }

    public function destroyPost(int $id)
    {
        BookPost::find($id)->remove();

        return 'true';
    }

    public function destroyComment(int $id)
    {
        BookComment::find($id)->remove();

        return 'true';
    }

    public function postLike(int $id)
    {
        $post = BookPost::find($id);
        if ($post && auth()->user()->isFriendWith($post->user) && ! auth()->user()->hasLikedPost($post)) {
            $post->likes()->create(['user_id' => auth()->id()]);

            return $post->LikesCount;
        }

        return $post->LikesCount;
    }

    public function commentLike(int $id)
    {
        $comment = BookComment::find($id);
        if ($comment && auth()->user()->isFriendWith($comment->user) && ! auth()->user()->hasLikedComment($comment)) {
            $comment->likes()->create(['user_id' => auth()->id()]);

            return $comment->LikesCount;
        }

        return $comment->LikesCount;
    }

    public function commentStore(Request $request)
    {
        $message = ['message' => $request->message['message']];
        $validator = \Validator::make($message, ['message' => 'required']);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $comment = new BookComment();
        $comment->text = $request->message['message'];
        $comment->post_id = $request->message['post_id'];
        $comment->user_id = Auth::id();
        $comment->save();
    }
}
