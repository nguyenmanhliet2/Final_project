<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class successPay extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $real_price;
    public $order_code;
    public $phone_number;


    public function __construct($name,$real_price, $order_code, $phone_number)
    {
        $this->name             = $name;
        $this->real_price       = $real_price;
        $this->order_code       = $order_code;
        $this->phone_number     = $phone_number;
    }

    public function build()
    {
        return $this->subject($this->name)->view('mail.order_mail', [
            'order_code' => $this->order_code,
            'phone_number' => $this->phone_number,
            'last_name' => $this->name,
            'real_price'   => $this->real_price,
        ]);
    }
}
