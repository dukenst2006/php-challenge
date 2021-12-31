<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;

class LoginControllerTest extends TestCase
{

    public function testUserLogin()
    {
        // Test
        $password = 'password';
        $passwordHash = Hash::make($password);
        $user = User::factory()->create(['password' => $passwordHash]);

        $response = $this->json(
            'post',
            route('login'),
            ['email' => $user->email, 'password' => $password]
        );
        // dd($response->json());
        $response->assertStatus(200);
    }
}
