<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ImportCustomersTest extends TestCase
{
    /**
     * @test
     */
    // public function can_import_customers()
    // {
    //     $this->artisan('import-customers:csv')->assertExitCode(0);
    // }

    public function test_customers_csv_file_exist()
    {
        $file = storage_path('customers.csv');
        // file name exists or not
        $this->assertFileExists(
            $file,
            "filename doesn't exists"
        );
    }
}
