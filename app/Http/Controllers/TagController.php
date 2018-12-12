<?php

namespace App\Http\Controllers;

use App\Poster;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
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

        return view('Tag.tag',compact('tag','posters'));
    }
}
