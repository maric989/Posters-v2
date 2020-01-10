<?php

namespace App\Events;

use App\Models\Poster\Poster;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class PosterApproved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $poster_id;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($poster_id)
    {
        $this->poster_id = $poster_id;
    }

}
