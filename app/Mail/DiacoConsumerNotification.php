<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DiacoConsumerNotification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $linkQueja;
    public $subject = "Atención al Consumidor - Solicitud para Completar  Queja ";

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($link)
    {
        $this->linkQueja = $link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.send.notification.diaco.ConsumerNotification',[
            'link'  =>  $this->linkQueja
        ])->subject($this->subject);
    }
}
