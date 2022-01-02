<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Test',
            'email' => 'test@gmail.com',
            'password' => bcrypt('secret'),
            'email_verified_at' => now(),
        ]);

        User::factory()->create([
            'name' => 'John',
            'email' => 'john@gmail.com',
            'password' => bcrypt('secret'),
            'email_verified_at' => now(),
        ]);
    }
}
