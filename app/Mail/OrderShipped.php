<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $mailDestinataire;
    public $nameDestinataire;
    public $mailContact;
    public $mailSubject;
    public $mailContent;
    public $mailDate;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sendMail)
    {
        $this->mailDestinataire = $sendMail['mailDestinataire'];
        $this->nameDestinataire = $sendMail['nameDestinataire'];
        $this->mailContact      = $sendMail['mailContact'];
        $this->mailSubject      = $sendMail['mailSubject'];
        $this->mailContent      = $sendMail['mailContent'];
        $this->mailDate         = $sendMail['mailDate'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from($this->mailContact)->subject($this->mailSubject)->view('emails.orders.shipped');

    }
}
