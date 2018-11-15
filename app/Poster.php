<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    public function likes()
    {
        return $this->morphMany(Like::class,'likeable');
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
}
