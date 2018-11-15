<?php

namespace App\Http\Controllers;

use App\Definition;
use App\Poster;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function settings()
    {
        if(!Auth::user()){
            return back();
        }
        $user = Auth::user();

        $poster_number = $user->getPostersCount();
        $definition_number = $user->getDefinitionCount();
        $poster_likes = $user->getPosterLikes();

        return view('user.settings',compact('user',
            'definition_number',
            'poster_number',
            'poster_likes'));
    }

    public function profile($slug)
    {
        $user = User::where('slug',$slug)->first();
        $posters = $user->getApprovedPosters();


        return view('user.profile',compact('user','posters'));
    }


}
