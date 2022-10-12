<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\PostCreated;
use App\Mail\PostCreatedMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class PostCreatedListener
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
     * @param  \App\Events\PostCreated  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        $users = User::whereNot('email', 'admin@admin.com')->get();

        foreach($users as $user)
        {
            Mail::to($user->email)->send(new PostCreatedMail($event->post));
        }
    }
}
