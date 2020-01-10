<?php

namespace App\Http\Controllers;

use App\Models\Comment\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * @param StoreCommentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
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
        $comment->comm_type = $request->type;

        $comment->save();

        return back();
    }

    public function dislike(Request $request)
    {
        $user_id = Auth::user()->id;
        $comment = Comment::find($request->comment_id);

        if ($comment->likes()->where('user_id',$user_id)->count()){
            $comment->likes()->where('user_id',$user_id)->delete();

            $liked = false;
        }else{
            $like = new Like();
            $like->user_id = $user_id;
            $like->up = 0;
            $like->down = 1;
            $comment->likes()->save($like);

            $liked = true;
        }

        $data = [
            'poster_id' => $comment->id
        ];
        return response()->json($data);
    }

    public function like(Request $request)
    {
        $user_id = Auth::user()->id;
        $comment = Comment::find($request->comment_id);

        if ($comment->likes()->where('user_id',$user_id)->count()){
            $comment->likes()->where('user_id',$user_id)->delete();

            $liked = false;
        }else{
            $like = new Like();
            $like->user_id = $user_id;
            $like->up = 1;
            $like->down = 0;
            $comment->likes()->save($like);

            $liked = true;
        }

        $data = [
            'poster_id' => $comment->id
        ];
        return response()->json($data);
    }
}
