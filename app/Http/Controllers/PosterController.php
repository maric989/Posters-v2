<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment\Comment;
use App\Http\Requests\StorePosterRequest;
use App\ImageUploader;
use App\Like;
use App\Models\Poster\PostCategory;
use App\Models\Poster\Poster;
use App\Models\Poster\PostersSummary;
use App\Tag;
use App\Models\User\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class PosterController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posters = Poster::getApprovedPosters('hot');

        $topPosters = (new PostersSummary())->getHighestRatedPosters(5);

        return view('user.index')->with([
            'posters'   => $posters,
            'topPosters' => $topPosters
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function create()
    {
        $user = Auth::user();
        $categories = Category::all();
        $last_poster = $user->posters()->orderBy('created_at','desc')->first();
        $date = Carbon::now()->subHour(5);

        if ($user->role_id == 1){
            return view('poster.create')->with([
                'categories' => $categories
            ]);
        }

        if (!is_null($last_poster)){
            if ($last_poster->created_at > $date){
                    return view('poster.limit',compact('last_poster'));
            }
        }

        return view('poster.create')->with([
            'categories' => $categories
        ]);
    }


    /**
     * @param StorePosterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePosterRequest $request)
    {
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
        $imageUploader->addTextOnImage('testtest');

        $poster->image   = '/images/'.$imageUploader->name;
        $poster->title   = $request->title;
        $poster->user_id = Auth::user()->id;
        $poster->slug    = str_slug($request->title,'-');

        $poster->save();

        event(new \App\Events\PosterWasUploaded($poster));

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

        if(isset($request->category)) {
            (new PostCategory())->storeCategory($poster->id, $request->category);
        }

        return redirect('/')->with('success','Vas Poster mora dobiti odobrenje od moderatora!');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

        return view('poster.single')->with([
            'poster'    => $poster,
            'comments'  => $comments,
            'tags'      => $tags,
            'likesUp'   => $likesUp,
            'likesDown' => $likesDown,
            'likesSum'  => $likesSum,
            'tagged'    => $tagged,
            'user'      => Auth::user()
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
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
            'poster_id' => $poster->id
        ];

        event(new \App\Events\PosterReaction($poster->id, 'like'));


        return response()->json($data);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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
            'poster_id' => $poster->id
        ];

        event(new \App\Events\PosterReaction($poster->id, 'dislike'));


        return response()->json($data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function videoCreate()
    {
        return view('poster.video_create');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function trending()
    {
        $posters = Poster::getApprovedPosters('trending');

        $topPosters = (new PostersSummary())->getHighestRatedPosters(5);

        return view('poster.trending')->with([
            'posters'    => $posters,
            'topPosters' => $topPosters
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function fresh()
    {
        $posters = Poster::getApprovedPosters('fresh');

        $topPosters = (new PostersSummary())->getHighestRatedPosters(5);

        return view('poster.fresh')->with([
            'posters'    => $posters,
            'topPosters' => $topPosters
        ]);
    }

    public function search(Request $request)
    {
        $q = $request->q;
        $results = Poster::where('title','LIKE','%'.$q.'%')->get();
        $comments = Comment::all();

        return view('search',compact('results','comments'));
    }

}
