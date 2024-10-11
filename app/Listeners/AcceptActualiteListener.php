<?php

namespace App\Listeners;

use App\Events\AcceptActualiteEvent;
use App\Mail\Auth\AcceptActualiteMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class AcceptActualiteListener
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
    public function handle(AcceptActualiteEvent $event): void
    {
        $data = $event->data;

        Mail::to($data['email'])->send(new AcceptActualiteMail($data));
    }
}
