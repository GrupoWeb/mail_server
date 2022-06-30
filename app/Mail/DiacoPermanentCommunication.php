<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DiacoPermanentCommunication extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $descripcion;
    public $observacion;
    public $flag;
    public $subject = "Atención al Consumidor - DIACO";

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($descripcion, $observacion, $flag)
    {
        $this->descripcion = $descripcion;
        $this->observacion = $observacion;
        $this->flag = $flag;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.send.notification.diaco.PermanentComunication',[
            'descripcion'  =>  $this->descripcion,
            'obs'  =>  $this->observacion,
            'flag'  =>  $this->flag
        ])->subject($this->subject);
    }
}
