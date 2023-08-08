<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendPhr extends Mailable
{
    use Queueable, SerializesModels;
    public $SendPhr;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($SendPhr)
    {   
     
        $this->SendPhr = $SendPhr;
    }
     


    public function build()
    {
        return $this->subject('RAV Guru Shishya Parampara '.format_patient_id($this->SendPhr['send']).'Received PHR Record')
                    ->view('emails.sendphr');
    }

    /**
     * Get the message envelope.
     * 
     * 
     * 
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        if(isset($this->SendPhr['title'])){
           return new Envelope(
                subject: $this->SendPhr['title'],
            );
        } else {
            return new Envelope(
                subject: 'Your Shishya shared a PHR ('.format_patient_id($this->SendPhr['send']).') with you.',
            );
        }
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.sendphr',
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
