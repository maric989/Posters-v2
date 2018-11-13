<?php

namespace App\Http\Controllers;

use App\Poster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PosterController extends Controller
{

    public function index()
    {

        $posters = Poster::where('approved','1')->orderBy('created_at','desc')->get();

        return view('user.index',compact('posters'));
    }

    public function create()
    {
        return view('poster.create');
    }

    public function store(Request $request)
    {
        if (!Auth::user())
        {
            return back();
        }
        $poster = new Poster();

        $image = $request->file('posterImg');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);

        $poster->image   = '/images/'.$name;
        $poster->title   = $request->title;
        $poster->user_id = Auth::user()->id;
        $poster->slug    = str_slug($request->title,'-');

        $poster->save();

        return redirect('/');
    }

    public function single($slug,$id)
    {
        $poster = Poster::whereId($id)->first();

        return view('poster.single',compact('poster'));
    }

    public function videoCreate()
    {
        return view('poster.video_create');
    }
}
