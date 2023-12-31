<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class InscricaoConfirmadaEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $data;
    public $nome;
    public $pdf;
    public $reenvio;

    public function __construct($data, $nome , $pdf, $reenvio = false)
    {
        $this->data = $data;
        $this->nome = $nome;
        $this->pdf = $pdf;
        $this->reenvio = $reenvio;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('sistemas@mpap.mp.br', 'MPAP'),
            subject: 'Inscricao Confirmada Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.inscricao',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {

        return [
            Attachment::fromData(fn () => $this->pdf, 'Comprovante-de-Inscricao.pdf')
                ->withMime('application/pdf'),
        ];
    }
}