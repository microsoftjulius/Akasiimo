<?php

namespace App\Imports;

use App\beneficiaries;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Request;

class CsvImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row, Request $request)
    {
        return new beneficiaries([
            "user_id" => 1,
            "SNo" => $row["Sno"],
            "NIN" => $row["NIN"],
            "surname" => $row["surname"],
            "other_names" => $row["other_names"],
            "Age" => $row["Age"],
            "district" =>$row["district"],
            "sub_county" => $row["sub_county"],
            "Amount" => $row["Amount"],
            "Schedule"=>$row["Schedule"],
            "payment_status"=>$row["payment_status"]
        ]);
    }
}
