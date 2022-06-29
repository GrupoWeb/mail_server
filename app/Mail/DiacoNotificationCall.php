<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DiacoNotificationCall extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $nameQueja;
    public $numberQueja;
    public $linkQueja;
    public $subject = "Notificación de queja grabada número ";

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $number, $link)
    {
        $this->nameQueja = $name;
        $this->numberQueja = $number;
        $this->linkQueja = $link;
        $this->subject = $this->subject . $number;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.send.notification.diaco.callCenter',[
            'name'  => $this->nameQueja,
            'number'    =>  $this->numberQueja,
            'link'  =>  $this->linkQueja
        ])->subject($this->subject);
    }
}
