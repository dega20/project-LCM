<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Apply; // WAJIB: Import Model Apply

class ApplySubmitted extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $apply; // Deklarasi variabel publik untuk data lamaran

    /**
     * Create a new message instance.
     */
    public function __construct(Apply $apply)
    {
        $this->apply = $apply; // Menyimpan objek Apply yang dikirim dari Controller
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Konfirmasi Penerimaan Lamaran Kerja',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            // Ganti 'emails.apply-submitted' dengan nama view Blade Anda
            view: 'emails.apply-submitted', 
            // Mengirimkan semua data yang dibutuhkan ke view
            with: [
                'applicantName' => $this->apply->nama,
                'position' => $this->apply->posisi,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        // Opsional: Anda bisa melampirkan file CV di sini, tetapi pengiriman file besar via email tidak disarankan
        return [];
    }
}