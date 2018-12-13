<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Definition;
use App\Http\Requests\StoreDefinitionRequest;
use App\Like;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DefinitionController extends Controller
{
    public function index()
    {
        $definitions = Definition::where('approved',1)->orderBy('created_at','desc')->get();
        $comments = Comment::all();

        return view('definition.index',compact('definitions','comments'));
    }

    public function trending()
    {
        $definitions = Definition::where('approved',1)->orderBy('created_at','desc')->get();
        $comments = Comment::all();

        return view('definition.trending',compact('definitions','comments'));
    }

    public function fresh()
    {
        $definitions = Definition::where('approved',1)->orderBy('created_at','desc')->paginate(12)->get();
        $comments = Comment::all();

        return view('definition.fresh',compact('definitions','comments'));
    }

    public function create()
    {
        return view('definition.create');
    }

    public function store(StoreDefinitionRequest $request)
    {
        $definition = new Definition();

        $definition->title = $request->title;
        $definition->body = $request->body;
        $definition->user_id = Auth::user()->id;

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

        $definition->slug = str_slug($request->title,'-');
        $definition->save();

        $user = User::find(Auth::user()->id);
        if ($user->role_id == 3){
            $user->role_id = 2;

            $user->save();
        }

        foreach ($tags as $tag) {
            $tag_id = Tag::where('name',strtolower($tag))->pluck('id')->first();
            DB::table('tags_posts')->insert(
                ['tag_id' => $tag_id,
                    'post_id' => $definition->id,
                    'post_type' => 'App\Definition'
                ]
            );
        }

        return redirect('/')->with('success','Vasa Definicija mora dobiti odobrenje od moderatora!');

    }

    public function single($slug,$id)
    {
        $definition = Definition::whereId($id)->first();

        $likesUp = Like::where('likeable_id',$definition->id)
            ->where('up',1)
            ->where('likeable_type','App\Definition')
            ->get();

        $likesDown = Like::where('likeable_id',$definition->id)
            ->where('down',1)
            ->where('likeable_type','App\Definition')
            ->get();

        $comments = Comment::where('post_id',$definition->id)
            ->where('comm_type','App\Definition')
            ->get();

        $tags_id = DB::table('tags_posts')
            ->where('post_id','=',$definition->id)
            ->where('post_type','=','App\Definition')
            ->get();

        $likesSum = $likesUp->count() - $likesDown->count();

        if (!$tags_id->isEmpty() ){
            foreach ($tags_id as $tag_id){
                $tageed_id[] = $tag_id->tag_id;
            }

            $tagged = Tag::whereIn('id',$tageed_id)->get();
        }else{
            $tagged = false;
        }

        return view('definition.single',compact(
            'definition',
            'comments',
            'likesSum',
            'likesDown',
            'likesUp',
            'tagged'));
    }

    public function search(Request $request)
    {
        $q = $request->q;
        $results = Definition::where('title','LIKE','%'.$q.'%')->get();
        $comments = Comment::all();

        return view('search_definition',compact('results','comments'));
    }
}
