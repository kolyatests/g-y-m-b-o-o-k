<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\MessageRequest;
use App\Models\Book\BookComment;

class CommentController extends Controller
{
    public function store(MessageRequest $request)
    {
        $comment = new BookComment();
        $comment->text = $request->message;
        $comment->post_id = $request->post_id;
        $comment->user_id = auth()->id();
        $comment->save();

        return redirect()->back()->with(['success' => 'Ваш комментарий добавлен!']);
    }

    public function destroy(int $id)
    {
        BookComment::find($id)->remove();

        return redirect()->back()->with(['success' => 'Запись удалена.']);
    }

    public function getLike(int $id)
    {
        $comment = BookComment::find($id);
        if (!$comment) {
            redirect()->back();
        }
        if (!auth()->user()->isFriendWith($comment->user)) {
            return redirect()->back();
        }
        if (auth()->user()->hasLikedComment($comment)) {
            return redirect()->back();
        }
        $comment->likes()->create(['user_id' => auth()->id()]);

        return redirect()->back();
    }
}
