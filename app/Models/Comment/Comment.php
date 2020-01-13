<?php

namespace App\Models\Comment;

use App\Like;
use App\Models\Poster\Poster;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function poster()
    {
        return $this->belongsTo(Poster::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function likes()
    {
        return $this->morphMany(Like::class,'likeable');
    }

    /**
     * @return float|int
     */
    public function getCommentLikesAttribute()
    {
        $likes = Like::where('likeable_id',$this->id)->where('likeable_type',Comment::class)->pluck('up')->toArray();
        $sum = array_sum($likes);
        return $sum;
    }

    /**
     * @return float|int
     */
    public function getCommentDislikesAttribute()
    {
        $dislikes = Like::where('likeable_id',$this->id)->where('likeable_type',Comment::class)->pluck('down')->toArray();
        $sum = array_sum($dislikes);
        return $sum;
    }

    public function isUserLikedOrDisliked($user_id)
    {
        $likes = Like::where('likeable_type',Comment::class)->where('user_id',$user_id)->where('likeable_id',$this->id)->get();
        return $likes->isEmpty() ? false : true;
    }
}
