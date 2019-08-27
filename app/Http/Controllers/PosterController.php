<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Http\Requests\StorePosterRequest;
use App\ImageUploader;
use App\Like;
use App\PostCategory;
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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //HOT POSTERS
        //Get all posters
        $posters = Poster::all();
        $hotConfig = $this->loadPosterLikesConfig('hot');
        $ids = [];

        //Count their likes
        foreach ($posters as $poster){
            if ($poster->getPosterLikes($poster->id) > $hotConfig['min']){
                $ids[] = $poster->id;
            };
        }
        //Get Posters with more then minimum limit
        $posters = Poster::whereIn('id',$ids)->orderBy('created_at','desc')->paginate();

        //Get Comments
        $comments = Comment::all();

        //Get Tags
        $tags = Tag::getMostUsedTags();

        $topPosters = (new Poster)->getHighestRankedPoster(5);
        if (empty($topPosters)){
            $topPosters = [];
        }


        return view('user.index')->with([
            'posters'   => $posters,
            'comments'  => $comments,
            'user'      => Auth::user(),
            'tags'      => $tags,
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
        Log::info('ssss',$data);
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
            'up' => $up,
            'down' => $down,
            'sum' => $sum
        ];
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
        $trendingConfig = $this->loadPosterLikesConfig('trending');
        $posters = Poster::all();
        $ids = [];

        //Count their likes
        foreach ($posters as $poster){
            if ($poster->getPosterLikes($poster->id) >= $trendingConfig['min'] && $poster->getPosterLikes($poster->id) <= $trendingConfig['max']){
                $ids[] = $poster->id;
            };
        }

        //Get Posters with more then HOT_LIKES_MIN
        $posters = Poster::whereIn('id',$ids)->orderBy('created_at','DESC')->paginate();

        $comments = Comment::all();
        $user = Auth::user();
        $topPosters = (new Poster)->getHighestRankedPoster(5);
        if (empty($topPosters)){
            $topPosters = [];
        }


        return view('poster.trending')->with([
            'posters'    => $posters,
            'comments'   => $comments,
            'user'       => $user,
            'topPosters' => $topPosters
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function fresh()
    {
        $freshConfig = $this->loadPosterLikesConfig('fresh');
        $posters = new \App\Poster();
        $ids = [];

        //Count their likes
        foreach ($posters->all() as $poster){
            if ($poster->getPosterLikes($poster->id) <= $freshConfig['max']){
                $ids[] = $poster->id;
            };
        }

        //Get Posters with more then HOT_LIKES_MIN
        $posters = $posters->whereIn('id',$ids)->orderBy('created_at','DESC')->paginate();
        $topPosters = (new Poster)->getHighestRankedPoster(5);
        if (empty($topPosters)){
            $topPosters = [];
        }

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

    private function loadPosterLikesConfig($type)
    {
        $config = config('posters');

        return $config[$type]['likes'];
    }
}
