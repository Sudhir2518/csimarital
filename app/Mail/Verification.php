<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Verification extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $first_name;
    public $ticket;
    public function __construct($email,$first_name,$ticket)
    {
        $this->email = $email;
        $this->first_name = $first_name;
        $this->ticket = $ticket;
    }

    public function build()
    {
        return $this->markdown('emails.verification')
        ->subject('Welcome to CSIMarital');
    }
}
