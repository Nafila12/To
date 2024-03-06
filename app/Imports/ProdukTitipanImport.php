<?php

namespace App\Imports;

use App\Models\ProdukTitipan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProdukTitipanImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            ProdukTitipan::create([
                'nama_produk' => $row['nama_produk'],
                'nama_supplier' => $row['nama_supplier'],
                'harga_beli' => $row['harga_beli'],
                'harga_jual' => $row['harga_jual'],
                'stok' => $row['stok'],
            ]);
        }
    }
}

// <?php

// namespace App\Imports;

// use App\Models\jenis;
// use App\Models\ProdukTitipan;
// use Illuminate\Support\Collection;
// use Maatwebsite\Excel\Concerns\ToCollection;
// use Maatwebsite\Excel\Concerns\ToModel;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;

// class produkTitipanImport implements ToCollection, WithHeadingRow
// {
//     /**
//      * @param array $row
//      *
//      * @return \Illuminate\Database\Eloquent\Model|null
//      */
//     public function collection(Collection $rows)
//     {
//         foreach ($rows as $row) {
//             ProdukTitipan::create([
//                 'nama_produk' => $row['nama_produk'],
//                 'nama_supplier' => $row['nama_supplier'],
//                 'harga_beli' => $row['harga_beli'],
//                 'harga_jual' => $row['harga_jual'],
//                 'stok' => $row['stok'],

//             ]);
//         }
//     }
// }


// // foreach ($rows as $row) {
// //     ProdukTitipan::create([
// //         'nama_produk' => $row['nama_produk'],
// //         'nama_supplier' => $row['nama_supplier'],
// //         'harga_beli' => $row['harga_beli'],
// //         'harga_jual' => $row['harga_jual'],
// //         'stok' => $row['stok'],

// //     ]);
// // }
