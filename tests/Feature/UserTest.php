<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * A basic feature test for testing email.
     *
     * @return void
     */
    public function test_it_requires_an_email()
    {
        $this->json('POST', 'api/login')
            ->assertJsonValidationErrors(['email']);
    }

    /**
     * A basic feature test for testing password validation.
     *
     * @return void
     */
    public function test_it_requires_a_password()
    {
        $this->json('POST', 'api/login')
            ->assertJsonValidationErrors(['password']);
    }

    public function test_it_return_a_validation_error_if_credentials_do_not_match()
    {
        $user = User::factory()->create();
        $this->json('POST', 'api/login', [
            'email' => $this->faker->email(),
            'password' => 'nope'
        ])
            ->assertJsonValidationErrors(['password']);
        $this->json('POST', 'api/login', [
            'email' => $user->email,
            'password' => 'nope'
        ])
            ->assertJsonValidationErrors(['password']);

    }

    public function test_user_can_login()
    {
        $user = User::factory()->create();

        $this->json('POST', 'api/login', [
            'email' => $user->email,
            'password' => 'password'
        ])->assertJsonStructure([
            'data' => [
                'token',
                'token_type',
            ]
        ]);
    }
}
