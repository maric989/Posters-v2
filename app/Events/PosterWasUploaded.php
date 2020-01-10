<?php

namespace App\Events;

use App\Models\Poster\Poster;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class PosterWasUploaded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $poster;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Poster $poster)
    {
        $this->poster = $poster;
    }

}
