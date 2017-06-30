<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $sender;
    public $email;
    public $Bodymessage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sender, $email, $Bodymessage)
    {
        $this->sender = $sender;
        $this->email = $email;
        $this->Bodymessage = $Bodymessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.contact')
        ->subject("{$this->sender} sent a message")
        ->from('erm@erm.com')
        ->replyTo($this->email);
    }
}
