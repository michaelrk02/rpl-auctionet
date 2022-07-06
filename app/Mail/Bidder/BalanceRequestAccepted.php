<?php

namespace App\Mail\Bidder;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\SaldoRiwayat;

class BalanceRequestAccepted extends Mailable
{
    use Queueable, SerializesModels;

    protected $type;
    protected $request;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($type, SaldoRiwayat $request)
    {
        $this->subject = '[AUCTIONET] '.$type.' Request Accepted';
        $this->type = $type;
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.bidder.balance_request_accepted', ['type' => $this->type, 'request' => $this->request]);
    }
}
