<?php

namespace App\Jobs;

use App\Models\Post;
use App\Models\Susbscriber;
use App\Mail\MailPost;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendPostEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $subscriber;
    public $post;
    public $tries = 100;
    public $backoff = 10;

    public function __construct(Susbscriber $subscriber, Post $post)
    {
        $this->subscriber = $subscriber;
        $this->post = $post;
    }

    public function handle(): void
    {
        Mail::to($this->subscriber->email)->send(new MailPost($this->post));
    }
}
