<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Menu;
use App\Models\stok;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class diagramController extends Controller
{
    public function index()
    {
        $count_transaksi = Transaksi::count();
        $count_menu = Menu::count();
        $count_stok = Stok::count();

        $menu_counts = DetailTransaksi::select('menu_id', DB::raw('COUNT(*) as total'))
            ->groupBy('menu_id')
            ->orderBy('total', 'desc')
            ->limit(5) // Mengambil 5 menu yang paling sering dipesan
                ->get();

        // Menyimpan hasil dalam array
        // Menghitung jumlah pesanan untuk setiap menu
        $menu_counts = DetailTransaksi::select('menu_id', DB::raw('COUNT(*) as total'))
        ->groupBy('menu_id')
        ->orderBy('total', 'desc')
        ->limit(5) // Mengambil 5 menu yang paling sering dipesan
        ->get();
        
        // Menyimpan hasil dalam array
        $most_ordered_menu = [];
        foreach ($menu_counts as $menu_count) {
            $menu = Menu::find($menu_count->menu_id);
            $most_ordered_menu[$menu->nama_menu] = $menu_count->total;
            $pendapatan = DetailTransaksi::sum('subtotal');
            // Mendapatkan stok terendah
        $stokTerendah = stok::orderBy('jumlah')->limit(5)->get();
        }
        


        
        // Mendapatkan pendapatan per tanggal
        $pendapatan_per_tanggal = DetailTransaksi::select(
            DB::raw('DATE(created_at) as tanggal'),
            DB::raw('SUM(subtotal) as total_pendapatan')
        )
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

          
            
        return view('tamplate.dashboard', compact(
            'count_menu',
            'most_ordered_menu',
            'count_transaksi',
            'pendapatan_per_tanggal',
            'count_stok',
            'pendapatan',
            'stokTerendah'
        ));
    }

  

}