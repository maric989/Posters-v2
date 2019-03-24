<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\StorePosterRequest;
use App\ImageUploader;
use App\Like;
use App\Poster;
use App\Tag;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class PosterController extends Controller
{

    public function index()
    {
        //HOT POSTERS
        //Get all posters
        $posters = Poster::all();
        $ids = [];

        //Count their likes
        foreach ($posters as $poster){
            if ($poster->getPosterLikes($poster->id) > env('HOT_LIKES_MIN')){
                $ids[] = $poster->id;
            };
        }
        //Get Posters with more then HOT_LIKES_MIN
        $posters = Poster::whereIn('id',$ids)->orderBy('created_at','DESC')->paginate();

        //Get Comments
        $comments = Comment::all();
        $topAuthor = (new User())->getTopAuthor();

        if (Auth::user()){
            $user = Auth::user();
        }
        //Get Tags
        $tags = Tag::getMostUsedTags();

        return view('user.index',compact(
            'posters',
            'comments',
            'user',
            'tags',
            'topAuthor'));
    }

    public function create()
    {
        if(!Auth::user()){
            return back();
        }

        $user = Auth::user();

        $last_poster = $user->posters()->orderBy('created_at','desc')->first();
        $date = Carbon::now()->subHour(5);

        if ($user->role_id == 1){
            return view('poster.create');
        }

        if (!is_null($last_poster)){
            if ($last_poster->created_at > $date){
                    return view('poster.limit',compact('last_poster'));
            }
        }

        return view('poster.create');
    }

    public function store(StorePosterRequest $request)
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
        $imageUploader = new ImageUploader($request->file('posterImg'));
        $imageUploader->store();
//        $imageUploader->resizeImage(300,200);
        $imageUploader->addTextOnImage('testtest');
        $poster->image   = '/images/'.$imageUploader->name;
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

        return redirect('/')->with('success','Vas Poster mora dobiti odobrenje od moderatora!');
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
        $tags = Tag::getMostUsedTags();
        Log::info('ccccc',[$tags]);
        $likesSum = $likesUp->count() - $likesDown->count();

        if (!$tags_id->isEmpty() ){
            foreach ($tags_id as $tag_id){
                $tageed_id[] = $tag_id->tag_id;
            }

            $tagged = Tag::whereIn('id',$tageed_id)->get();
        }else{
            $tagged = false;
        }

        if (Auth::user()){
            $user = Auth::user();
        }

        return view('poster.single',compact(
            'poster',
            'comments',
            'tags',
            'likesUp',
            'likesDown',
            'likesSum',
            'tagged',
            'user'
        ));
    }

    public function upvote(Request $request)
    {

        if (!Auth::user()){
            return redirect('login');
        }
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
        Log::info('ssss',$data);
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

    public function trending()
    {
        $posters = Poster::all();
        $ids = [];

        //Count their likes
        foreach ($posters as $poster){
            if ($poster->getPosterLikes($poster->id) >= env('TRENDING_LIKES_MIN') && $poster->getPosterLikes($poster->id) <= env('TRENDING_LIKES_MAX')){
                $ids[] = $poster->id;
            };
        }

        //Get Posters with more then HOT_LIKES_MIN
        $posters = Poster::whereIn('id',$ids)->orderBy('created_at','DESC')->paginate();

        $comments = Comment::all();
        $user = Auth::user();

        return view('poster.trending',compact('posters','comments','user'));
    }

    public function fresh()
    {
        $posters = Poster::all();
        $ids = [];

        //Count their likes
        foreach ($posters as $poster){
            if ($poster->getPosterLikes($poster->id) <= env('FRESH_LIKES_MAX')){
                $ids[] = $poster->id;
            };
        }

        //Get Posters with more then HOT_LIKES_MIN
        $posters = Poster::whereIn('id',$ids)->orderBy('created_at','DESC')->paginate();
        $comments = Comment::all();
        $user = Auth::user();


        return view('poster.fresh',compact('posters','comments','user'));
    }

    public function search(Request $request)
    {
        $q = $request->q;
        $results = Poster::where('title','LIKE','%'.$q.'%')->get();
        $comments = Comment::all();

        return view('search',compact('results','comments'));
    }
    
}
