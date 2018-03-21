<?php

namespace App\Listeners;

use App\Events\NewPost;
use App\Jobs\NotifyAdminOfNewPost;

class NewPostListener
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
     * @param  NewPost  $event
     * @return void
     */
    public function handle(NewPost $event)
    {
        NotifyAdminOfNewPost::dispatch($event->post);
    }
}
