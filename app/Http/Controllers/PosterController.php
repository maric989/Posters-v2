<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Poster;
use App\Tag;
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

        $comments = Comment::where('post_id',$poster->id)
            ->where('comm_type','App\Poster')
            ->get();

        $tags_id = DB::table('tags_posts')
                ->where('post_id','=',$poster->id)
                ->where('post_type','=','App\Poster')
                ->get();

        foreach ($tags_id as $tag_id){
            $tageed_id[] = $tag_id->tag_id;
        }

        $tags = Tag::whereIn('id',$tageed_id)->get();

        return view('poster.single',compact(
            'poster',
            'comments',
            'tags'
        ));
    }

    public function videoCreate()
    {
        return view('poster.video_create');
    }
}
