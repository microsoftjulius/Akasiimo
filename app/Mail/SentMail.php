<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $title;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@akasiimo.opm.go.ug')
        ->view('After.users');
    }
}
