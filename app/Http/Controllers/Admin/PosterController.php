<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Like;
use App\Poster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PosterController extends Controller
{
    public function getPosters()
    {

        if (!Auth::user()){
            return redirect('/');
        }
        $user = Auth::user();

        if ($user->role_id != 1){
            return redirect('/');
        }
        $posters = Poster::paginate(12);

        return view('admin.posters',compact('user','posters'));
    }

    public function getApprovedPosters()
    {
        $user = Auth::user();
        $posters = Poster::where('approved','1')->paginate(12);

        return view('admin.posters_approved',compact('user','posters'));
    }

    public function getSinglePoster($id)
    {
        $user = Auth::user();
        $poster = Poster::whereId($id)->first();
        $comments = Comment::where('post_id',$poster->id)->where('comm_type','App\Poster')->get();
        $likes = Like::where('likeable_id',$poster->id)->where('likeable_type','App\Poster')->get();

        return view('admin.poster_single',compact('poster','user','comments','likes'));
    }

    public function getWaitingPosters ()
    {
        $user = Auth::user();
        $posters = Poster::where('approved','0')->paginate(12);

        return view('admin.posters_not_approved',compact('user','posters'));
    }

    public function approve($id)
    {
        $poster = Poster::whereId($id)->first();
        $poster->approved = 1;
        $poster->save();

        return back()->with('success','Poster je odobren');
    }

    public function refuse($id)
    {
        $poster = Poster::whereId($id)->first();
        $poster->approved = 0;
        $poster->save();

        return back()->with('error','Poster je odbijen');
    }

    public function delete($id)
    {
        $poster = Poster::whereId($id)->first();
        $comments = Comment::where('post_id',$poster->id)->where('comm_type','App\Poster')->get();

        if ($comments){
            foreach ($comments as $comment){
                $comment->delete();
            }
        }

        $poster->delete();


        return back();
    }

}
