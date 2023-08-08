<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PhrGuruShishya2 extends Mailable
{
    use Queueable, SerializesModels;
     public $PhrGuruShishya2;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($PhrGuruShishya2)
    {
        $this->PhrGuruShishya2 = $PhrGuruShishya2;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Your Guru '.$this->PhrGuruShishya2['guruname'].' shared a PHR ( '.format_patient_id($this->PhrGuruShishya2['send']).') with you.',
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
            view: 'emails.PhrGuruShishya2',
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
