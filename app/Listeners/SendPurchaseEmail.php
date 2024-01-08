<?php

namespace App\Listeners;

use App\Mail\Purchasesuccesfull;
use App\Mail\PurchasesuccesfullEmail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SendPurchaseEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
 
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $purchase = $event->purchase;

        

        
        // $user = User::where('id', Auth::user()->id)->first();

        Mail::to('admin@gmail.com')->send(new PurchasesuccesfullEmail($purchase));
    }
}
