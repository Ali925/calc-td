<?php

namespace App\Listeners;

use App\Events\OrderCreate;
use App\TechEmail;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class TechEmailSend
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderCreate  $event
     * @return void
     */
    public function handle(OrderCreate $event)
    {
        $users[] = TechEmail::all(['email'])->toArray();
        $users[] = User::where('role', 2)->get('email')->toArray();
        $pdf_coast = PDF::loadView('emails.tech', $event->details);
        $pdf_empty = PDF::loadView('emails.empty', $event->details);

        Mail::send('emails.manager',
            [
                'order' => $event->order,
                'customer' => $event->customer,
            ], function ($m) use ($users, $event, $pdf_coast, $pdf_empty) {
                $m->from('tdsouz@tds-sofi.spb.ru', 'Калькулятор');
                $m->to('melentev.av@gmail.com')->subject('Новый заказ');

                foreach ($event->details as $detail){
                    $m->attachData($detail->image, $detail->name);
                }

                $m->attachData($pdf_coast, 'With Prise');
                $m->attachData($pdf_empty, 'WithOut Prise');
        });
    }
}
