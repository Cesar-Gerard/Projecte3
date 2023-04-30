<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecuperaPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nom_usuari, $cognoms_usuari, $id_usuari)
    {
        $this->nom_usuari = $nom_usuari;
        $this->cognoms_usuari = $cognoms_usuari;
        $this->id_usuari = $id_usuari;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails/recupera_password',["nom_usuari"=>$this->nom_usuari,"cognoms_usuari"=>$this->cognoms_usuari,"id_usuari"=>$this->id_usuari])->subject("Restaurar la contrasenya");
    }
}
