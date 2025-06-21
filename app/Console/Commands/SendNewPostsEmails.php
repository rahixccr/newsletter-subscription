<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use App\Models\Subscription;
use App\Models\SentHistory;
use App\Models\Susbscriber;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailPost;
use Illuminate\Support\Facades\DB;

class SendNewPostsEmails extends Command
{
    protected $signature = 'emails:send-new-posts';

    public function handle(): void
    {
        $newPosts = Post::where('sent', false)->get();

        foreach ($newPosts as $post) {
            $subscriptions = Subscription::where('id_site', $post->id_site)->get();

            foreach ($subscriptions as $subscription) {
                $subscriber = $subscription->susbscriber;

                $alreadySent = SentHistory::where('id_post', $post->id)
                    ->where('id_subscriber', $subscriber->id)
                    ->exists();

                if (!$alreadySent) {
                    dispatch(new \App\Jobs\SendPostEmailJob($subscriber, $post));
                    SentHistory::create([
                        'id_post' => $post->id,
                        'id_subscriber' => $subscriber->id,
                    ]);
                }
            }

            $post->update(['sent' => true]);
        }

        $this->info('Emails queued for new posts.');
    }
}
