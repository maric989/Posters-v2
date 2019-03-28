<?php

namespace App\Http\Controllers;

use App\Definition;
use App\Poster;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $loggedUser = Auth::user();
        $users = User::all();
        $posters = Poster::all();
        $definitions = Definition::all();

        $data = [
            'user'        => $loggedUser,
            'users'       => $users,
            'posters'     => $posters,
            'definitions' => $definitions
        ];

        return view('admin.index')->with($data);
    }





}
