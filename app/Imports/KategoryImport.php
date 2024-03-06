<?php

namespace App\Imports;

use App\Models\kategory;
use Maatwebsite\Excel\Concerns\ToModel;

class KategoryImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new kategory([
            'nama' => $row['nama']
        ]);
    }
    public function headingRow()
    {
        return 1;
    }
}
