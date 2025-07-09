<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class NotificationEvaluation extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nouvelle Évaluation'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mails.notification_evaluation',  
            with: ['data' => $this->data],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
