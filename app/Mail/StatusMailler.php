<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class StatusMailler extends Mailable
{
    use Queueable, SerializesModels;

    public $order_num;
    public $bill;
    public $status;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order_num = $order->order_num;
        $this->bill = $order->bill;
        $this->status = $order->status;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.status')->with([
            'order_num' => $this->order_num,
            'bill' => $this->bill,
            'status' => $this->status,
        ]);
    }
}
