<?php

namespace App\Http\Controllers;

use App\Definition;
use App\Poster;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AutorsController extends Controller
{
    public function index()
    {
        $autors = User::where('role_id',2)->get();
        $likes = [];
        foreach ($autors as $autor) {
            $likes[$autor->id] = $this->countLikesDiff($autor->id);
        }
        arsort($likes);

        $user_ids = array_keys($likes);

        $sorted_autors = User::whereIn('id',$user_ids)
            ->orderBy(DB::raw("FIELD(id,".join(',',$user_ids).")"))
            ->get();

        return view('user.autors',compact('sorted_autors'));
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

    public static function countLikesDiff($id)
    {
        $posterUp =   Poster::getUserPosterLikes($id);
        $posterDown = Poster::getUserPosterDislikes($id);
        $definitionUp = Definition::getUserDefinitionLikes($id);
        $definitionDown = Definition::getUserDefinitionDislikes($id);

        $ups = $posterUp + $definitionUp;
        $downs = $posterDown + $definitionDown;
        $sum = $ups - $downs;

        return $sum;
    }
}
