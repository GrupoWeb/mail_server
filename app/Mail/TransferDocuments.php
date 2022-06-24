<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TransferDocuments extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $usuario_to;
    public $empresa_to;
    public $numero_to;
    public $asunto_to;
    public $subject = "Traslado de Expediente";
    public $interno;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usuario,$empresa,$correlativo,$asunto,$nInterno)
    {
        $this->usuario_to = $usuario;
        $this->empresa_to = $empresa;
        $this->numero_to = $correlativo;
        $this->asunto_to = $asunto;
        $this->interno = $nInterno;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.send.notification.mineco.traslado', [
            'usuario_to' => $this->usuario_to,
            'empresa_to' => $this->empresa_to,
            'numero_to' => $this->numero_to,
            'asunto_to' => $this->asunto_to,
            'interno' => $this->interno 
        ])->subject($this->subject);
    }
}
