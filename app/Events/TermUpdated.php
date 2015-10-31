<?php

namespace App\Events;

use App\Events\Event;
use App\Term;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TermUpdated extends Event implements ShouldBroadcast
{
    use SerializesModels;
    /**
     * @var Term
     */
    public $term;

    /**
     * Create a new event instance.
     *
     * @param Term $term
     */
    public function __construct(Term $term)
    {
        $this->term = $term;
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