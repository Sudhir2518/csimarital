<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendLike extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     public $likeduser;
     public $likedmatch;
     public $token;

     public $liked;

    public function __construct($userliked,$matchliked,$token,$liked)
    {
        $this->likeduser = $userliked;
        $this->likedmatch = $matchliked;
        $this->token = $token;
        $this->liked = $liked;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('emails.send-like');
    }
}
