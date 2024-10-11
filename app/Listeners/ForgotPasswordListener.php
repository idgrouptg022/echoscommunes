<?php

namespace App\Listeners;

use App\Events\ForgotPasswordEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\Reporters\ForgotPasswordMail;
use Illuminate\Contracts\Queue\ShouldQueue;

class ForgotPasswordListener
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
    public function handle(ForgotPasswordEvent $event): void
    {
        $data = $event->data;

        Mail::to($data["email"])->send(new ForgotPasswordMail($data));
    }
}
