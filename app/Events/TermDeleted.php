<?php

namespace App\Events;

use App\Events\Event;
use App\Term;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TermDeleted extends Event implements ShouldBroadcast
{
    use SerializesModels;
    /**
     * @var Term
     */
    public $term;

    /**
     * Create a new event instance.
     *
     * @param $term
     */
    public function __construct($id)
    {
        $this->term = (object) compact('id');
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['term'];
    }
}
