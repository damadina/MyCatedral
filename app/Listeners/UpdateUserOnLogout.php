<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateUserOnLogout
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }


    public function handle(object $event): void
    {
        session()->put('authOn',"SI");
    }
}
