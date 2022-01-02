<?php

namespace App\Observers;

use App\Models\Customer;
use App\Jobs\GeocodeAddress;
use Illuminate\Foundation\Bus\DispatchesJobs;

class CustomerObserver
{
    use DispatchesJobs;
    /**
     * Handle the Customer "created" event.
     *
     * @param  \App\Models\Customer  $customer
     * @return void
     */
    public function created(Customer $customer)
    {
        $this->dispatch(new GeocodeAddress($customer));
    }
}
