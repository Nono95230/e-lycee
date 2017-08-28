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

        //return $this->markdown('emails.orders.shipped');

        //return $this->from('amine.brakni@gmail.com')->subject('important')->view('emails.welcome');
        //return $this->from($this->mailContact)->subject($this->mailSubject)->markdown('emails.orders.shipped');
        //return $this->from($contact['email'])->subject($contact['subject'])->view('emails.welcome');
        //return $this->subject($this->subject)->to($this->to)->view('emails.welcome');

        
        return $this->from('amine.brakni@gmail.com')->view('emails.orders.shipped');
        //return $this->subject('Hello there!')->view('emails.welcome');
        //return $this->from('amine.brakni@gmail.com')->view('emails.welcome');
    }
}
