<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Maatwebsite\Excel\Concerns\WithStartRow;

use App\Models\Company;

class CompanyImport implements ToModel, WithStartRow
{
    /**
    * @param Collection $collection
    */

    public function model(array $row)
    {
        return new Company([
            'name' => $row[0],

        ]);
    }

    public function startRow(): int
    {
        return 1;
    }
}
