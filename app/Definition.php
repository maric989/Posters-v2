<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Definition extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class,'likeable');
    }

    public static function getUserDefinitionLikes($user_id)
    {
        $posters_id = Poster::where('user_id',$user_id)->pluck('id')->toArray();

        $result = [];
        foreach ($posters_id as $id)
        {
            $result[] = Like::where('likeable_id',$id)
                ->where('likeable_type','App\Definition')
                ->pluck('up')->sum();
        }
        $sum = array_sum($result);
        return $sum;
    }

    public static function getUserDefinitionDislikes($user_id)
    {
        $posters_id = Poster::where('user_id',$user_id)->pluck('id')->toArray();

        $result = [];
        foreach ($posters_id as $id)
        {
            $result[] = Like::where('likeable_id',$id)
                ->where('likeable_type','App\Definition')
                ->pluck('down')->sum();
        }
        $sum = array_sum($result);
        return $sum;
    }
}
