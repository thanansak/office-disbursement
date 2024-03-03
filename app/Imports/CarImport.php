<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Maatwebsite\Excel\Concerns\WithStartRow;

use App\Models\Company;
use App\Models\Site;
use App\Models\CarType;
use App\Models\Car;
class CarImport implements ToModel, WithStartRow
{
    use HasFactory;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $car_type_id = CarType::where('name',$row[2])->first()->id;
        $company_id = Company::where('name',$row[14])->first()->id;
        $site_id = Site::where('name',$row[15])->first()->id;
        // dd($car_type_id);
        return new Car([
            'registration_number' => $row[0],
            'registration_date' => $row[1],
            'year' => $row[3],
            'color' => $row[4],
            'brand' => $row[5],
            'chassis_number' => $row[6],
            'engine_brand' => $row[7],
            'engine_number' => $row[8],
            'fuel_type' => $row[9],
            'weight' => $row[10],
            'total_weight' => $row[11],
            'province' => $row[12],
            'fuel_consumption' => $row[13],
            'status' => Car::READY,
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
