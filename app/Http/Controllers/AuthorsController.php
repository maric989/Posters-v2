<?php

namespace App\Http\Controllers;

use App\Definition;
use App\Poster;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorsController extends Controller
{
    public function index()
    {
        $sorted_authors = (new User)->sortedAuthors();

        return view('user.autors',compact('sorted_authors'));
    }

    public function coverImg(Request $request)
    {
        $user = User::whereId($request->user_id)->first();

        $image = $request->file('cover_img');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images/autori/cover/');
        $image->move($destinationPath, $name);

        $user->cover_photo = '/images/autori/cover/'.$name;
        $user->save();

        return back();
    }

    public function profileImg(Request $request)
    {
        $user = User::whereId($request->user_id)->first();

        $image = $request->file('profile_img');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images/autori/profile/');
        $image->move($destinationPath, $name);

        $user->profile_photo = '/images/autori/profile/'.$name;
        $user->save();

        return back();

    }


}
