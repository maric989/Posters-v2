<?php

namespace App\Console\Commands;

use App\Like;
use App\Poster;
use App\PostersSummary;
use Illuminate\Console\Command;

class UpdatePosterSummary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:posters:summary {poster_id?}';

    protected $like;
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Posters Summary Data';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $poster_id = $this->argument('poster_id');

        if ($poster_id !== null){
            $like =  Like::where('likeable_id',$poster_id)->where('likeable_type','App\Poster')->sum('up');
            $dislike =  Like::where('likeable_id',$poster_id)->where('likeable_type','App\Poster')->sum('down');
            $rating = $like - $dislike;

            $summary = \App\PostersSummary::updateOrCreate(
                ['poster_id' => $poster_id],
                [
                    'likes_count' => $like,
                    'rating' => $rating,
                    'dislikes_count' => $dislike,
                    'comments_count' => 0,
                    'views_count' => 0
                ]
            );

            exit('Done');
        }

        $posters_ids = Poster::pluck('id')->toArray();
        foreach ($posters_ids as $id){
            $like =  Like::where('likeable_id',$id)->where('likeable_type','App\Poster')->sum('up');
            $dislike =  Like::where('likeable_id',$id)->where('likeable_type','App\Poster')->sum('down');
            $rating = $like - $dislike;

            $summary = \App\PostersSummary::updateOrCreate(
                ['poster_id' => $id],
                [
                    'likes_count' => $like,
                    'rating' => $rating,
                    'dislikes_count' => $dislike,
                    'comments_count' => 0,
                    'views_count' => 0
                ]
            );
        }
        exit('Done');
    }
}
