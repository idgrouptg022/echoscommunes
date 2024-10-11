<?php

namespace App\Listeners;

use App\Events\RejectActualiteEvent;
use App\Mail\Auth\RejectActualiteMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class RejectActualiteListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(RejectActualiteEvent $event): void
    {
        $data = $event->data;

        Mail::to($data["email"])->send(new RejectActualiteMail($data));
    }
}
