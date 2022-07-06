<?php

namespace App\Mail\Bidder;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Pengiriman;

class ProductShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = '[AUCTIONET] Product Shipped';
    protected $pengiriman;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Pengiriman $pengiriman)
    {
        $this->pengiriman = $pengiriman;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.bidder.product_shipped', ['pengiriman' => $this->pengiriman]);
    }
}
