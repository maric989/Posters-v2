<?php

namespace App\Http\Controllers;

use App\Definition;
use App\Poster;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (!Auth::user()){
            return redirect('/');
        }
        $user = Auth::user();

        if ($user->role_id != 1){
            return redirect('/');
        }

        $users = User::all();
        $posters = Poster::all();
        $definitions = Definition::all();

        return view('admin.index',compact('user','users','posters','definitions'));
    }
}
