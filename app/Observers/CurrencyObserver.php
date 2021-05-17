<?php

namespace App\Observers;

use App\Models\Currency;

class CurrencyObserver
{
    /**
     * Handle the Currency "saved" event.
     *
     * @param \App\Models\Currency $currency
     * @return void
     */
    public function saved(Currency $currency)
    {
        $currency->history()->create(['rate' => $currency->rate]);
    }
}
