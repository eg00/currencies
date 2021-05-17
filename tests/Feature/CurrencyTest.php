<?php

namespace Tests\Feature;

use App\Http\Resources\CurrencyResource;
use App\Models\Currency;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class CurrencyTest extends TestCase
{

    use RefreshDatabase;
    use WithFaker;

    public function test_get_all_currencies()
    {
        Currency::factory()->count(20)->create();
        $user = User::factory()->create();
        Sanctum::actingAs($user, ['*']);

        $this->get("api/currencies")
            ->assertStatus(200)

            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'char_code',
                        'name',
                        'rate',
                        'updated',
                    ]
                ],
            ])
            ->assertJsonCount(10, 'data');
    }

    public function test_get_one_currency()
    {
       $currencies =  Currency::factory()->count(20)->create();

        $currency = $currencies->random();

        $user = User::factory()->create();
        Sanctum::actingAs($user, ['*']);

        $this->get("api/currency/{$currency->id}")
            ->assertStatus(200)
            ->assertJson((new CurrencyResource($currency))->response()->getData(true));

        $this->get("api/currency/{$currency->char_code}")
            ->assertStatus(200)
            ->assertJson((new CurrencyResource($currency))->response()->getData(true));
    }
}
