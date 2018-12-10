<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterUserRequest $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->slug = str_slug($request->name,'-');
        $user->role_id = 3;

        $user->save();

        Auth::login($user);

        return redirect('/');

    }

    public function login(LoginUserRequest $request)
    {
        if(Auth::user())
        {
            return back();
        }
        $email = $request->email;

        $user = User::where('email',$email)->first();
        $password = bcrypt($request->oassword);

        dd($password);
        if ($user == NULL){
            return back();
        }

        if (decrypt($user->password) === $request->password){
            Auth::login($user);
        }else{
            return back();
        }

    }
}
