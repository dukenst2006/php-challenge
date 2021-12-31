<?php

namespace App\Models;

use App\Contracts\Geocodable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model implements Geocodable
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'email',
        'gender',
        'company',
        'city',
        'title',
        'latitude',
        'longitude'
    ];

    public function getAddressString(): string
    {
        return sprintf('%s, %s', $this->city, 'us');
    }

    public function setCoordinates($latitude, $longitude): bool
    {
        return $this->update(compact('latitude', 'longitude'));
    }
}
