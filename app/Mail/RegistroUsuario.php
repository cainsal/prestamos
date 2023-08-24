<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistroUsuario extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Registro Exitoso';

    public $infoUser;
    public $password;
    public $update;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($password, $userData,$subject = 'Registro Exitoso',$update=false)
    {
        $this->password = $password;
        $this->infoUser = $userData;
        $this->update = $update;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))->view('emails.registro-usuario');
    }
}
