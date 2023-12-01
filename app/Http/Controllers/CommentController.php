<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function submit(CommentRequest $request)
    {
        $comment = new Comment();
        $comment->content = $request->get('content');
        $comment->post_id = $request->get('post_id');
        $comment->user_id = Auth::id();
        $comment->save();
        return redirect()->route('app.index');
    }
}
