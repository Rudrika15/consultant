<?php

namespace App\Imports;

// use App\Models\ConsultantImport;
use Maatwebsite\Excel\Concerns\ToModel;

class ExcelImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new ExcelImport([
            //
        ]);
    }
}
