<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
class LeadJsonMail extends Mailable
{
    public $leadData;

    public function __construct($leadData)
    {
        $this->leadData = $leadData;
    }

    public function build()
    {
        return $this->subject('Lead Data')->view('emails.leadjson')
                    ->with([
                        'leadData' => $this->leadData,
                    ]);
    }
}
