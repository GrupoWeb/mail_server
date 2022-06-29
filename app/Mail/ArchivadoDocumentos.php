<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ArchivadoDocumentos extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $usuarioTo;
    public $internalCorrelative;
    public $externalCorrelative;
    public $receivingUser;
    public $typeDocument;

    public function __construct($userTo, $internalCorrelative, $externalCorrelative, $receivingUser,$typeDocument)
    {
        $this->usuarioTo = $userTo;
        $this->internalCorrelative = $internalCorrelative;
        $this->externalCorrelative = $externalCorrelative;
        $this->receivingUser = $receivingUser;
        $this->typeDocument = $typeDocument;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('view.name');
    }
}
