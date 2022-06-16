<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendNotificationDace extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    private $empresa;
    private $cliente;
    public $subject = "Consultas Dace";

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($empresa, $cliente)
    {
        $this->empresa = $empresa;
        $this->cliente = $cliente;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.send.notification.dace',[
            'empresa'       =>  $this->empresa,
            'cliente'       =>  $this->cliente
        ])->subject($this->subject);
    }
}
