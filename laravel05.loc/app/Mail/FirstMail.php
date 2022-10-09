<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FirstMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailMassage)
    {
       $this->mailMassage = $mailMassage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('ololo@mai.ru', 'Ololo ololo')
            ->to('ololo@mail2.ru')
            ->cc(['ololo3@mail.ru'])
            ->subject('jerrghkshkgkd')
            ->markdown('emails.first')
            ->with([
                'message2'=> 'fvefvewvw',
                'mailMessage'=> $this->mailMassage
            ])
            ;
    }
}
