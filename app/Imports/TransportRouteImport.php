<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Maatwebsite\Excel\Concerns\WithStartRow;

use App\Models\Company;
use App\Models\Site;
use App\Models\CarType;
use App\Models\Car;
use App\Models\TransportRoute;

class TransportRouteImport implements ToModel, WithStartRow
{
    use HasFactory;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        $car_type_id = CarType::where('name',$row[5])->first()->id;
        $company_id = Company::where('name',$row[3])->first()->id;
        $site_id = Site::where('name',$row[4])->first()->id;
        // dd($car_type_id);
        return new TransportRoute([
            'name' => $row[0],
            'billing_price' => ( $row[1] != '' ? str_replace(',', '', $row[1]) : 0),
            'distance' => ( $row[2] != '' ? str_replace(',', '', $row[2]) : 0),
            'transport_expense' => ( $row[6] != '' ? str_replace(',', '', $row[6]) : 0),
            'transport_expense_company' => ( $row[7] != '' ? str_replace(',', '', $row[7]) : 0),
            'transport_fuel' => ( $row[8] != '' ? str_replace(',', '', $row[8]) : 0),
            'transport_fuel_company' => ( $row[9] != '' ? str_replace(',', '', $row[9]) : 0),
            'other_expense1' => ( $row[10] != '' ? str_replace(',', '', $row[10]) : 0),
            'other_expense2' => ( $row[11] != '' ? str_replace(',', '', $row[11]) : 0),
            'other_expense3' => ( $row[12] != '' ? str_replace(',', '', $row[12]) : 0),
            'other_expense4' => ( $row[13] != '' ? str_replace(',', '', $row[13]) : 0),
            'publish' => 1,
            'car_type_id' => $car_type_id,
            'company_id' =>  $company_id,
            'site_id' => $site_id,

        ]);
    }
    public function startRow(): int
    {
        return 2;
    }
}
