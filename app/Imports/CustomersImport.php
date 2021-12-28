<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithProgressBar;

class CustomersImport implements ToModel, WithHeadingRow, WithProgressBar
{
    use Importable;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Customer([
            'id'             => $row['id'],
            'first_name'     => $row['first_name'],
            'last_name'      => $row['last_name'],
            'email'          => $row['email'],
            'gender'         => $row['gender'],
            'company'        => $row['company'],
            'city'           => $row['city'],
            'title'          => $row['title']
        ]);
    }
}
