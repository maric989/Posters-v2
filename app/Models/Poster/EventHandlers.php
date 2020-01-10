<?php

namespace App\Models\Poster;

use Illuminate\Contracts\Queue\ShouldQueue;

class EventHandlers implements ShouldQueue
{
    public function onPosterPosted($event)
    {

    }

    public function onPosterApproved($event)
    {
        $summary = new \App\Models\Poster\PostersSummary();
        $summary->poster_id = $event->poster_id;
        $summary->likes_count = 0;
        $summary->dislikes_count = 0;
        $summary->rating = 0;
        $summary->views_count = 0;
        $summary->comments_count = 0;

        $summary->save();
    }
    public function subscribe($events)
    {
        $events->listen('App\Events\PosterWasUploaded','App\Models\Poster\EventHandlers@onPosterPosted');
        $events->listen('App\Events\PosterApproved','App\Models\Poster\EventHandlers@onPosterApproved');

    }
}
