<?php

namespace App\Mail;

use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

// class commentedPostedMardown extends Mailable implements ShouldQueue
class commentedPostedMardown extends Mailable
{
    use Queueable, SerializesModels;
    public $comment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $subject = "Commented was posted on your blog post";
        return $this->attachFromStorage($this->comment->post->image,'post.jpg')->subject($subject)->markdown('emails.commentMarkdown');
    }
}
