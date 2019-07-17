<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreComment;

class CommentController extends Controller
{
    public function store(StoreComment $request)
    {
        $comment = new Comment;
        $comment->fill($request->all());

        if (Auth::check())
            $comment->user_id = Auth::id();

        $comment->save();

        return redirect('/posts/' . $request->post_id);
    }

    public function update(Request $request, Comment $comment)
    {
        //
    }

    public function destroy(Comment $comment)
    {
        //
    }
}
