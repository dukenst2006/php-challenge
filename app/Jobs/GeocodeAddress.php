<?php

namespace App\Jobs;

use App\Contracts\Geocodable;
use Illuminate\Bus\Queueable;
use Geocoder\Laravel\Facades\Geocoder;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class GeocodeAddress implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $model;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Geocodable $model)
    {
        $this->model = $model;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $result = Geocoder::geocode($this->model->getAddressString())->get();

        $this->model->setCoordinates($result->first()?->getCoordinates()->getLatitude(), $result->first()?->getCoordinates()->getLongitude());
    }
}
