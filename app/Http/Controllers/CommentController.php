<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\StoreCommentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request)
    {
        if (Auth::user()){
            $user = Auth::user();
        }else{
            return redirect('/')->with('error','Morate biti prijavljeni da bi ostavili komentar');
        }
        $comment = new Comment();

        $comment->body = $request->body;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $request->poster_id;
        $comment->comm_type = 'App\Poster';

        $comment->save();

        return back();
    }
}
