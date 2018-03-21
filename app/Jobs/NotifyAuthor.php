<?php

namespace App\Jobs;

use App\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserPostWasUpdatedEmail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class NotifyAuthor implements ShouldQueue
{
    protected $post;

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->post->author)->send(new UserPostWasUpdatedEmail($this->post));
    }
}
