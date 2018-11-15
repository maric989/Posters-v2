<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Like;
use App\Poster;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        $tags = explode(',',$request->tags);
        foreach ($tags as $tag){
            $check_tag = Tag::where('name',strtolower($tag))->get();

            if ($check_tag->isEmpty()){
                $new_tag = new Tag();
                $new_tag->name = $tag;

                $new_tag->save();
            }else{
                continue;
            }
        }

        $image = $request->file('posterImg');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);

        $poster->image   = '/images/'.$name;
        $poster->title   = $request->title;
        $poster->user_id = Auth::user()->id;
        $poster->slug    = str_slug($request->title,'-');

        $poster->save();

        $user = User::find(Auth::user()->id);
        if ($user->role_id == 3){
            $user->role_id = 2;

            $user->save();
        }

        foreach ($tags as $tag) {
            $tag_id = Tag::where('name',strtolower($tag))->pluck('id')->first();
            DB::table('tags_posts')->insert(
              ['tag_id' => $tag_id,
               'post_id' => $poster->id,
               'post_type' => 'App\Poster'
              ]
            );
        }
        
        return redirect('/');
    }

    public function single($slug,$id)
    {
        $poster = Poster::whereId($id)->first();

        $likesUp = Like::where('likeable_id',$poster->id)
            ->where('up',1)
            ->where('likeable_type','App\Poster')
            ->get();

        $likesDown = Like::where('likeable_id',$poster->id)
            ->where('down',1)
            ->where('likeable_type','App\Poster')
            ->get();

        $comments = Comment::where('post_id',$poster->id)
            ->where('comm_type','App\Poster')
            ->get();

        $tags_id = DB::table('tags_posts')
                ->where('post_id','=',$poster->id)
                ->where('post_type','=','App\Poster')
                ->get();

        $likesSum = $likesUp->count() - $likesDown->count();

        if (!$tags_id->isEmpty() ){
            foreach ($tags_id as $tag_id){
                $tageed_id[] = $tag_id->tag_id;
            }

            $tags = Tag::whereIn('id',$tageed_id)->get();
        }else{
            $tags = false;
        }

        return view('poster.single',compact(
            'poster',
            'comments',
            'tags',
            'likesUp',
            'likesDown',
            'likesSum'
        ));
    }

    public function upvote(Request $request)
    {
        $user_id = Auth::user()->id;
        $poster = Poster::find($request->poster_id);

        if ($poster->likes()->where('user_id',$user_id)->count()){
            $poster->likes()->where('user_id',$user_id)->delete();

            $liked = false;
        }else{
                $like = new Like();
                $like->user_id = $user_id;
                $like->up = 1;
                $like->down = 0;
                $poster->likes()->save($like);

                $liked = true;
        }

        $up = $poster->likes()->where('up',1)->count();
        $down = $poster->likes()->where('down',1)->count();
        $sum = $up-$down;
        $data = [
            'up' => $up,
            'down' => $down,
            'sum' => $sum
        ];

        return response()->json($data);

    }

    public function downvote(Request $request)
    {
        $user_id = Auth::user()->id;
        $poster = Poster::find($request->poster_id);

        if ($poster->likes()->where('user_id',$user_id)->count()){
            $poster->likes()->where('user_id',$user_id)->delete();

            $liked = false;
        }else{
            $like = new Like();
            $like->user_id = $user_id;
            $like->up = 0;
            $like->down = 1;
            $poster->likes()->save($like);

            $liked = true;
        }
        $up = $poster->likes()->where('up',1)->count();
        $down = $poster->likes()->where('down',1)->count();
        $sum = $up - $down;
        $data = [
            'up' => $up,
            'down' => $down,
            'sum' => $sum
        ];
        return response()->json($data);
    }
    
    public function videoCreate()
    {
        return view('poster.video_create');
    }
    
    
}
