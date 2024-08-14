<?php

namespace App\Mail;

use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;

class ResponseMail extends Mailable
{
    use Queueable, SerializesModels;

    public $text;
    public $reponse;

    /**
     * Create a new text instance.
     *
     * @return void
     */
    public function __construct(
        $text,$reponse
    ) {
        $this->reponse=$reponse;
        $this->text=$text;
    }

    /**
     * Get the text content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'admin.contact.mail',
            with: [
                'text' => $this->text,
                'reponse' => $this->reponse,
            ],
        );
    }
}
