<?php

namespace App\Models\Poster;

use Illuminate\Database\Eloquent\Model;

class PostersSummary extends Model
{
    protected $table = 'posters_summary';

    protected $fillable = [
        'poster_id',
        'likes_count',
        'dislikes_count',
        'rating',
        'views_count',
        'comments_count',
    ];

    public function getPosterLikes($poster_id)
    {
        $likes =  $this->where('poster_id',$poster_id)->select('likes_count')->first();
        if (empty($likes)){
            return 0;
        }
        return $likes->likes_count;
    }

    public function getPosterDislikes($poster_id)
    {
        $dislikes =  $this->where('poster_id',$poster_id)->select('dislikes_count')->first();
        return $dislikes->likes_count;
    }

    public function getRating($poster_id)
    {
        $rating =  $this->where('poster_id',$poster_id)->select('rating')->first();
        return $rating->rating;
    }

    public function getHighestRatedPosters($number)
    {
        $posters_ids = $this->orderBy('rating','desc')->take($number)->pluck('poster_id')->toArray();
        $imploded_posters_ids = implode(',',$posters_ids);

        $posters = Poster::whereIn('id',$posters_ids)
            ->orderByRaw("FIELD(id, $imploded_posters_ids)")
            ->get();

        return $posters;
    }
}
