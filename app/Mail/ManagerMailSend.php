<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ManagerMailSend extends Mailable
{
    use Queueable, SerializesModels;

    public $customer;
    public $order;
    public $pdf_tech;
    public $pdf_empty;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order,$customer,$pdf_tech,$pdf_empty)
    {
        $this->order = $order;
        $this->customer = $customer;
        $this->pdf_empty = $pdf_empty;
        $this->pdf_tech = $pdf_tech;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.manager')
            ->attachData($this->pdf_tech,'С ценой '.$this->order->order_num.'.pdf')
            ->attachData($this->pdf_empty, 'Без цены'.$this->order->order_num.'.pdf')
            ->with([
            'customer' => $this->customer,
            'order' => $this->order,
        ]);
    }
}
