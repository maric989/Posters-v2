<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class Tag extends Model
{
    public function poster()
    {
        return $this->belongsTo(Poster::class);
    }

    public function definition()
    {
        return $this->belongsTo(Definition::class);
    }

    public static function getMostUsedTags()
    {
        $tags_ids = DB::table('tags_posts')
            ->select('tag_id')
            ->groupBy('tag_id')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(10)
            ->get();

        foreach ($tags_ids as $id){
            $tags[] = Tag::findMany([$id->tag_id]);
        }

        return $tags;
    }
}
