<?php

namespace App;

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
}
