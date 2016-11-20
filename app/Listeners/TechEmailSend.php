<?php

namespace App\Listeners;

use App\Events\OrderCreate;
use App\Mail\ManagerMailSend;
use App\TechEmail;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
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
        $user = TechEmail::all(['email'])->toArray();
        $users = User::where('role', 2)->get(['email'])->toArray();
        $pdf_coast = PDF::loadView('emails.tech', ['details' => $event->details])
            ->setPaper('a4', 'landscape')
            ->setWarnings(false)
            ->download('invoice.pdf');
        $pdf_empty = PDF::loadView('emails.empty', ['details' => $event->details])
            ->setPaper('a4', 'landscape')
            ->setWarnings(false)
            ->download('invoice.pdf');

        Mail::to('melentev.av@gmail.com')->send(new ManagerMailSend($event->order, $event->customer, $pdf_coast, $pdf_empty));
        //Mail::to($user)->send(new ManagerMailSend($event->order, $event->customer, $pdf_coast, $pdf_empty));

    }
}
