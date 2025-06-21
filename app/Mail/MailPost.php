<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailPost extends Mailable
{
    use Queueable, SerializesModels;

    public $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function build(): self
    {
        return $this->subject('New Post: ' . $this->post->title)
                    ->view('mails.post')
                    ->with(['post' => $this->post]);
    }
}
