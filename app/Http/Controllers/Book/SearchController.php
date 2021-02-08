<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getResults(Request $request)
    {
        $query = $request->input('query');
        if (!$query) {
            redirect()->route('book.friend.index');
        }
        $users = User::where(DB::raw("CONCAT (first_name, ' ', last_name)"), 'LIKE', "%{$query}%")
            ->orWhere('name', 'LIKE', "%{$query}%")
            ->get();

        return view('book.user.friends.results', compact('users'));
    }
}
