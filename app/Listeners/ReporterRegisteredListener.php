<?php

namespace App\Listeners;

use App\Mail\Guest\ReporterRegisteredMail;
use Illuminate\Support\Facades\Mail;
use App\Events\ReporterRegisteredEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReporterRegisteredListener
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
    public function handle(ReporterRegisteredEvent $event): void
    {
        $data = $event->data;

        Mail::to($data["email"])->send(new ReporterRegisteredMail($data));
    }
}
