<?php

namespace App\Http\Controllers;

use App\Models\Comment\Comment;
use App\Models\Poster\Poster;
use App\Tag;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    /**
     * @param $name
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index ($name)
    {
        $tag = Tag::where('name',$name)->first();
        $post_ids = DB::table('tags_posts')
            ->where('tag_id',$tag->id)
            ->get()
            ->toArray();
        $ids = [];
        foreach ($post_ids as $id){
            $ids[] = $id->post_id;
        }

        $posters = Poster::findMany($ids);
        //Get Comments
        $comments = Comment::all();


        return view('Tag.tag')->with([
            'tag'       => $tag,
            'posters'   => $posters,
            'comments'  => $comments,
        ]);
    }
}
