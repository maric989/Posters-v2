<?php

namespace App\Http\Controllers;

use App\Definition;
use App\Poster;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function settings()
    {
        $user = Auth::user();

        $poster_number = $user->getPostersCount();
        $definition_number = $user->getDefinitionCount();
        $poster_likes = $user->getPosterLikes();

        return view('user.settings')->with([
            'user' => $user,
            'definition_number' => $definition_number,
            'poster_number'     => $poster_number,
            'poster_likes'      => $poster_likes
        ]);
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile($slug)
    {
        $user = User::where('slug',$slug)->first();
        $posters = $user->getApprovedPosters();

        return view('user.profile')->with([
            'user' => $user,
            'posters' => $posters
        ]);
    }
}
