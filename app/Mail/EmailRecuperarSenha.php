<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailRecuperarSenha extends Mailable
{
    use Queueable, SerializesModels;

    protected $novaSenha;

    public function __construct($novaSenha)
    {
        $this->novaSenha = $novaSenha;
    }

    public function build()
    {   
        return $this->view('mails.email_recuperar_senha')->with( 'novaSenha', $this->novaSenha );
    }
}
