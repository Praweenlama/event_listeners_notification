<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostCreatedMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $post;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($post)
    {
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('This is test subject')
            ->markdown('mail.post_created_mail', ['post' => $this->post]);
        // return $this
        //     ->from('abc@gmail.com')
        //     ->subject('Subject of mail')
        //     ->attachFromStorage('sdsa', 'public')
        //     ->view('mail.post_created_mail');
    }
}
