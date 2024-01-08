<?php

namespace App\Listeners;

use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class inventoryUpdate
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

        Product::find($purchase->product_id)->decrement('qty', $purchase->qty);
    }
}
