<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterControllerTest extends TestCase
{
    public function testUserCanRegister()
    {
        $response = $this->json('POST', route('register'), [
            'name'  =>  'Test',
            'email'  =>  time() . 'test@example.com',
            'password'  =>  '123456789',
            'password_confirmation' => '123456789',
        ]);

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    public function testRegisterWithMissingData()
    {

        $payload = [
            'name'  =>  'Test',
            //email address is missing
            'password'  =>  '123456789',
            'password_confirmation' => '123456789',

        ];
        $this->json('post', route('register'), $payload)
            ->assertStatus(422);
    }
}
