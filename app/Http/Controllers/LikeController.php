<?php

namespace App\Http\Controllers;

use App\Models\Comment;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    public function like(Request $request)
    {
        $post_id = $request->input('post_id');
        $user_id = Auth::id();
        DB::insert('insert into post_like (post_id, user_id) values(?, ?)',[$post_id, $user_id]);
        return redirect()->route('app.index');
    }

    public function unlike(Request $request)
    {
        $post_id = $request->input('post_id');
        $user_id = Auth::id();
        DB::delete('delete from post_like where post_id = ? AND user_id = ?',[$post_id, $user_id]);
        return redirect()->route('app.index');
    }
}
