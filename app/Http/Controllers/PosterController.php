<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PosterController extends Controller
{
    public function create()
    {
        return view('poster.create');
    }

    public function store(Request $request)
    {
        dd($request);
    }
}
