<?php

namespace App\Mail;

use App\Models\Apply;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class InterviewInvitationMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $apply;
    /**
     * Create a new message instance.
     */
    public function __construct(Apply $apply)
    {
        $this->apply = $apply;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Undangan Wawancara Kerja',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.interview-invitation', 
            // Mengirimkan semua data yang dibutuhkan ke view
            with: [
                'applicantName' => $this->apply->nama,
                'position' => $this->apply->posisi,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
