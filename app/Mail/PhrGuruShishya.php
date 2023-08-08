<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PhrGuruShishya extends Mailable
{
    use Queueable, SerializesModels;
     public $PhrGuruShishya;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($PhrGuruShishya)
    {
        $this->PhrGuruShishya = $PhrGuruShishya;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Your Guru gives valuable feedbacks on your PHR  Number ('.format_patient_id($this->PhrGuruShishya['send']).').',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.phrgurushishya',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
