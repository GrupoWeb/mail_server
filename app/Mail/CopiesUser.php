<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CopiesUser extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;



    public $usuarioTo;
    public $empresa_to;
    public $numero_to;
    public $asunto_to;
    public $interno;
    public $copias;
    public $instrucciones;
    public $fecha;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usuario,$empresa,$correlativo,$asunto,$nInterno, $copias, $instrucciones,$fecha)
    {
        $this->usuarioTo = $usuario;
        $this->empresa_to = $empresa;
        $this->numero_to = $correlativo;
        $this->asunto_to = $asunto;
        $this->interno = $nInterno;
        $this->copias = $copias;
        $this->instrucciones = $instrucciones;
        $this->fecha = $fecha;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.send.notification.mineco.copies',[
            'usuario_to' => $this->usuarioTo,
            'empresa_to' => $this->empresa_to,
            'numero_to' => $this->numero_to,
            'asunto_to' => $this->asunto_to,
            'interno' => $this->interno,
            ['copias' => $this->copias],
            'instrucciones' => $this->instrucciones,
            'fecha' => $this->fecha
        ])->subject("Copia de traslado de documentos");
    }
}
