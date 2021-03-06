<?php

namespace App\Models\Poster;

use App\Like;
use App\Models\Comment\Comment;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Poster extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function categories()
    {
        return $this->belongsToMany(PostCategory::class,'post_categories');
    }

    public function likes()
    {
        return $this->morphMany(Like::class,'likeable');
    }

    public function getLikesCountAttribute()
    {
        return $this->likes()->count();
    }

    public function createdAtSerbian()
    {
        $created_at = $this->created_at->diffForHumans();
        $created_at = str_replace([' seconds', ' second'], ' Sekundi', $created_at);
        $created_at = str_replace( 'minute', ' Minut', $created_at);
        $created_at = str_replace('minutes', ' Minuta', $created_at);
        $created_at = str_replace( 'hour', ' Sat', $created_at);
        $created_at = str_replace('hours', ' Sata', $created_at);
//        $created_at = str_replace('month', ' Mesec', $created_at);
        $created_at = str_replace('months', ' Meseca', $created_at);
        $created_at = str_replace([' ago' ], ' ', $created_at);

        if(preg_match('(years|year)', $created_at)){
            $created_at = $this->created_at->toFormattedDateString();
        }

        return $created_at;
    }

    public function getComments($id)
    {
        $comments = Comment::where('post_id',$id)->where('comm_type','App\Poster')->get();

        return $comments;
    }

    /*
     * Sum all likes that poster have
     */
    public function getPosterLikes()
    {
        $likes = Like::where('likeable_id',$this->id)
            ->where('likeable_type','App\Poster')
            ->pluck('up')
            ->sum();

        return $likes;
    }

    /*
     * Sum all dislikes that poster have
     */
    public function getPosterDislikes()
    {
        $likes = Like::where('likeable_id',$this->id)
            ->where('likeable_type','App\Poster')
            ->pluck('down')
            ->sum();

        return $likes;
    }

    public static function getUserPosterLikes($user_id)
    {
        if(!Auth::user()){
            return false;
        }

        $posters_id = Poster::where('user_id',$user_id)->pluck('id')->toArray();

        $result = [];
        foreach ($posters_id as $id)
        {
            $result[] = Like::where('likeable_id',$id)
                ->where('likeable_type','App\Poster')
                ->pluck('up')->sum();
        }
        $sum = array_sum($result);

        return $sum;
    }

    public static function getUserPosterDislikes($user_id)
    {
        if(!Auth::user()){
            return false;
        }

        $posters_id = Poster::where('user_id',$user_id)->pluck('id')->toArray();

        $result = [];
        foreach ($posters_id as $id)
        {
            $result[] = Like::where('likeable_id',$id)
                ->where('likeable_type','App\Poster')
                ->pluck('down')->sum();
        }
        $sum = array_sum($result);
        return $sum;
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->format('d-m-y');
    }

    public function countComments()
    {
        return Comment::where('post_id',$this->id)->where('comm_type','App\Poster')->count();
    }

    // Main Posters Data Function

    public static function getApprovedPosters($rating)
    {
        $config = config('posters');
        $likes = $config[$rating]['likes'];

        $fresh_posters_id = PostersSummary::where('rating','<=',$likes['max'])
            ->where('rating', '>=', $likes['min'])
            ->pluck('poster_id')
            ->toArray();

        $fresh_posters = Poster::whereIn('id',$fresh_posters_id)
            ->where('approved',1)
            ->orderBy('created_at','DESC')
            ->paginate(10);

        return $fresh_posters;
    }



}
