<?php

namespace App\Exports;

use App\Models\Kategory;
use Maatwebsite\Excel\Concerns\FromCollection;

class KategoryExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Kategory::all();
    }
}
