<?php

namespace App\Http\Controllers\Book\Moderator;

use App\Models\Book\BookComment;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index()
    {
        $comments = BookComment::all();

        return view('book.moderator.comments.index', compact('comments'));
    }

    public function toggle(int $id)
    {
        $comment = BookComment::find($id);
        $comment->toggleStatus();

        return redirect()->back();
    }

    public function destroy(int $id)
    {
        BookComment::find($id)->remove();

        return redirect()->back();
    }
}
