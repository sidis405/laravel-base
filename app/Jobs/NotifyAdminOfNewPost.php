<?php

namespace App\Jobs;

use App\User;
use Illuminate\Bus\Queueable;
use App\Mail\AdminNewPostEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class NotifyAdminOfNewPost implements ShouldQueue
{
    protected $post;

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($post)
    {
        //
        $this->post = $post;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to(User::where('role', 'admin')->first())->send(new AdminNewPostEmail($this->post));
    }
}
