<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AutorsController extends Controller
{
    public function index()
    {
        $autors = User::where('role_id',2)->get();

        return view('user.autors');
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
