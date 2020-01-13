<?php

namespace App\Models\Comment;

use Illuminate\Contracts\Queue\ShouldQueue;

class EventHandlers implements ShouldQueue
{
    public function onCommentPosted($event)
    {
        //TODO zavris zapoceto
        dd($event);
    }

    public function subscribe($events)
    {
        $events->listen('App\Events\CommentIsPosted', 'App\Models\Comment\EventHandlers@onCommentPosted');
    }
}
