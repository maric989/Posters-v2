<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class PosterReaction
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $poster_id;
    public $reaction;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($poster_id, $reaction)
    {
        $this->poster_id = $poster_id;
        $this->reaction = $reaction;
    }

}
