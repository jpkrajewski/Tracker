<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Http;

class AddToSessionAfterLogin
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {

        try {
            $reponse = Http::get('https://zenquotes.io/api/quotes');
            session(['quotes' => $reponse->json()]);
        }
        catch(Exception $e)
        {
            session(['quotes' => $e.message()]);
        }

        session([
            'lifePercentUsed' => $event->user->lifePercentUsedToThirties,
            'lifePercentRest' => $event->user->lifePercentRestToThirties,
            'daysToThirties' => $event->user->daysToThirties,
            'daysSinceBirth' => $event->user->daysSinceBirth,
        ]);
    }
}
