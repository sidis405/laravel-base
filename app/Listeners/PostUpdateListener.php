<?php

namespace App\Listeners;

use App\Jobs\NotifyAuthor;
use App\Events\PostWasUpdated;

class PostUpdateListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PostWasUpdated  $event
     * @return void
     */
    public function handle(PostWasUpdated $event)
    {
        NotifyAuthor::dispatch($event->post);
    }
}
