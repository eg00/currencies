<?php

namespace Tests\Unit;

use App\Models\Currency;
use App\Models\CurrencyHistory;
use Tests\TestCase;


class CurrencyTest extends TestCase
{

    function test_create_currency()
    {
        $currency = Currency::factory()->create();


        $this->assertInstanceOf(Currency::class, $currency);
    }

    public function test_it_has_history()
    {
        $currency = Currency::factory()->create();

        $this->assertInstanceOf(CurrencyHistory::class, $currency->history->first());;
    }
}
