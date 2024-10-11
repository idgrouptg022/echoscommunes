<?php

namespace App\Listeners;

use App\Events\PasswordResetEvent;
use App\Mail\Reporters\PasswordResetMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class PasswordResetListener
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
    public function handle(PasswordResetEvent $event): void
    {
        $data = $event->data;

        Mail::to($data["email"])->send(new PasswordResetMail($data));
    }
}
