<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $dados;
    public function __construct($dados)
    {
        $this->dados = $dados;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->dados->email,$this->dados->name)
        ->subject("Formulario de contato: joaovitorp.com")
        ->view('Email')
        ->with([
            'Name' => $this->dados->name,
            'Email' => $this->dados->email,
            'Telefone' => $this->dados->tel,
            'Mensagem' => $this->dados->mensagem
        ]);;
    }
}
