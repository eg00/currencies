<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory()->state([
             'email' => env('USER_EMAIL'),
             'password' => Hash::make(env('USER_PASSWORD')),
         ])->create();
    }
}
