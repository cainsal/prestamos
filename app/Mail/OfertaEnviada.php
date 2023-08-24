<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OfertaEnviada extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Solicitud Recibida';

    public $oferta;
    public $solicitud;
    public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $solicitud, $ofertaSolicitud, $password)
    {
        $this->oferta = $ofertaSolicitud;
        $this->solicitud = $solicitud;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->solicitud->origen=="MiYunta"){
            return $this->from(env('MAIL_FROM_ADDRESS'))->view('emails.oferta-enviada');
        }else{
            return $this->from(env('MAILTC_FROM_ADDRESS'))->view('emails.oferta-enviada-tucasa');
        }
    }
}
