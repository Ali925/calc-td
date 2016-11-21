<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomerMailler extends Mailable
{
    use Queueable, SerializesModels;
    public $order;
    public $customer;
    public $pdf;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $customer, $pdf)
    {
        $this->customer = $customer;
        $this->order = $order;
        $this->pdf = $pdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.customer')
            ->subject('Заказ №'.$this->order->order_num.' в «Торговом доме «Союз» оформлен')
            ->attachData($this->pdf,'Детализация заказа.pdf')
            ->with([
                'order' => $this->order,
                'customer' => $this->customer,
            ]);
    }
}
