<?php

namespace Tests\Feature;

use Tests\TestCase;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Imports\CustomersImport;

class ImportCustomersTest extends TestCase
{
    /**
     * @test
     */
    public function can_import_customers()
    {
        Excel::fake();

        // get the file path
        $file = storage_path('app/customers.csv');

        // Excel::assertImported($file, 'local');

        Excel::assertImported($file, 'local', function (CustomersImport $import) {
            return true;
        });

        Excel::assertImported($file, function (CustomersImport $import) {
            return true;
        });
    }
}
