<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\WallRequest;
use App\Models\Book\BookWall;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class WallController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $walls = BookWall::notReply()->where(
                function ($query) {
                    return $query->where('user_id', Auth::id())->orWhereIn('user_id', auth()->user()->friends()->pluck('id'));
                }
            )
                ->orderBy('created_at', 'desc')
                ->paginate(10);

            return view('book.user.timeline.index', compact('walls'));
        }
        $count_reg_user = User::where('verify', 88)->count();

        return view('book.wall', compact('count_reg_user'));
    }

    public function postWall(WallRequest $request)
    {
        auth()->user()->walls()->create(['body' => $request->input('wall')]);

        return redirect()->route('book.wall')->with('info', 'Запись успешно добавлена!');
    }

    public function postReply(Request $request, int $id)
    {
        $this->validate($request, ["reply-{$id}" => 'required|max:1000'], ['required' => 'Обязательно для заполнения']);
        $wall = BookWall::notReply()->find($id);
        if (!$wall) {
            redirect()->route('book.wall');
        }
        if (!auth()->user()->isFriendWith($wall->user) && Auth::id() !== $wall->user->id) {
            return redirect()->route('book.wall');
        }
        $reply = new BookWall();
        $reply->body = $request->input("reply-{$wall->id}");
        $reply->user()->associate(auth()->user());
        $wall->replies2()->save($reply);

        return redirect()->back();
    }

    public function getLike(int $id)
    {
        $wall = BookWall::find($id);
        if (!$wall) {
            redirect()->route('book.wall');
        }
        if (!auth()->user()->isFriendWith($wall->user)) {
            return redirect()->route('book.wall');
        }
        if (auth()->user()->hasLikedWall($wall)) {
            return redirect()->back();
        }
        $wall->likes()->create(['user_id' => auth()->id()]);

        return redirect()->back();
    }
}
