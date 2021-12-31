<?php

namespace Tests;

use App\Models\User;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public $mockConsoleOutput = false;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutExceptionHandling();
        $this->artisan('passport:install');
    }

    public function signIn($user = null)
    {
        $user = $user ?? User::factory()->create();
        Passport::actingAs($user);
        return $user;
    }
}
