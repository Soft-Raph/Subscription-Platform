<?php

namespace App\Console\Commands;

use App\Mail\NewPostNotification;
use App\Models\SentPost;
use App\Models\Website;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendPostEmailsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-post-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Post Emails to all website subscribers';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $websites = Website::with('subscribers', 'posts')->get();
        DB::beginTransaction();

        try {
            $totalEmailsSent = 0;
            foreach ($websites as $website) {
                foreach ($website->posts as $post) {
                    $subscribers = $website->subscribers()->whereDoesntHave('sentPosts', function($query) use ($post) {
                        $query->where('post_id', $post->id);
                    })->get();
                    $numberOfSubscribers = $subscribers->count();
                    foreach ($subscribers as $subscriber) {
                        Mail::queue(new NewPostNotification($subscriber->email, $post));
                        SentPost::create([
                            'post_id' => $post->id,
                            'subscriber_id' => $subscriber->id,
                        ]);
                    }
                    $totalEmailsSent += $numberOfSubscribers;
                }
            }
            DB::commit();
            Log::info("Emails dispatched successfully. Total emails sent: {$totalEmailsSent}.");
            $this->alert('Command Run Successful Total emails sent: '.$totalEmailsSent);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to dispatch emails: ' . $e->getMessage());
        }
    }
}
