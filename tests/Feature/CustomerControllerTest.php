<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerControllerTest extends TestCase
{

    /**
     * test get all customers.
     *
     * @return void
     */
    public function test_get_all_customer()
    {
        $user = $this->signIn();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $user->access_token,
        ])->json('GET', 'api/customers');

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    /**
     * test get single customer by id.
     *
     * @return void
     */
    public function test_get_single_customer_by_id()
    {
        $user = $this->signIn();
        // Create a new customer
        $customer = Customer::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => time() . '@example.com',
            'gender' => 'Male',
            'company' => 'Test company',
            'city'  => 'Dalas',
            'title' => 'ceo'
        ]);
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $user->access_token,
        ])->json('GET', 'api/v1/customers/' . $customer->id);

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    public function testShowForMissingCustomer()
    {
        $user = $this->signIn();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $user->access_token,
        ])->json('GET', 'api/v1/customers/' . 0);

        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }
}
