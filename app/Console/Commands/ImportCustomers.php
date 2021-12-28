<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Imports\CustomersImport;

class ImportCustomers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import-customers:csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import customers from csv file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // get the file path
        $file = storage_path('customers.csv');

        if (file_exists($file)) {
            $this->output->title('Starting importing customers');
            (new CustomersImport)->withOutput($this->output)->import($file);
            $this->output->success('Customers import successful');
        } else {
            $this->error("\n customers.csv fle is not found.");
        }
    }
}
