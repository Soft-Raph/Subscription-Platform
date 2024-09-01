<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewPostNotification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $post;
    public $email;
    /**
     * @param $email
     * @param $post
     */
    public function __construct($email, $post)
    {
        $this->email = $email;
        $this->post = $post;
    }
    public function build()
    {
        return $this->from('admin@subPlatform', 'Sub-Platform')
            ->subject("🎉 New Post Published")
            ->to($this->email)
            ->view('emails.newpost')->with(['post' => $this->post]);
    }
}
