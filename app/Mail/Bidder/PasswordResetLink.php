<?php

namespace App\Mail\Bidder;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Bidder;

class PasswordResetLink extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = '[AUCTIONEER] Password Reset Link';
    protected $bidder;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Bidder $bidder)
    {
        $this->bidder = $bidder;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.bidder.password_reset_link', ['bidder' => $this->bidder]);
    }
}
