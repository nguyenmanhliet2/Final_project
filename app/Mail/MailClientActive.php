<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailClientActive extends Mailable
{
    use Queueable, SerializesModels;

    public $full_name;
    public $hash;
    public $title;



    public function __construct($full_name, $hash, $title)
    {
        $this->full_name       = $full_name;
        $this->hash            = $hash;
        $this->title           = $title;
    }

    public function build()
    {
        return $this->subject($this->title)->view('mail.mail_client_active', [
            'full_name' => $this->full_name,
            'hash'      => $this->hash,
        ]);
    }


}
