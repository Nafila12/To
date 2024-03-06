<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Http\Requests\TransaksiRequest;
use App\Models\DetailTransaksi;
use App\Models\stok;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['transaksi'] = Transaksi::orderBy('created_at', 'ASC')->get();
        return view('transaksi.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            // Menghitung nomor transaksi baru
            $last_id = Transaksi::whereDate('tanggal', today())->latest()->first();
            $last_id_number = $last_id ? substr($last_id->id, 8) : 0;
            $notrans = today()->format('Ymd') . str_pad($last_id_number + 1, 4, '0', STR_PAD_LEFT);

            // Membuat transaksi baru
            $transaksi = Transaksi::create([
                'id' => $notrans,
                'tanggal' => today(),
                'total_harga' => $request->total,
                'metode_pembayaran' => 'cash', // Metode pembayaran default, bisa disesuaikan
                'keterangan' => '' // Keterangan default, bisa disesuaikan
            ]);

            // Membuat detail transaksi
            foreach ($request->orderedList as $detail) {
                $stok = stok::where('menu_id', $detail['menu_id'])->first();
                $stok->jumlah = $stok->jumlah - $detail['qty'];
                $stok->save();
                DetailTransaksi::create([
                    'transaksi_id' => $notrans,
                    'menu_id' => $detail['menu_id'],
                    'jumlah' => $detail['qty'],
                    'subtotal' => $detail['harga'] * $detail['qty']
                ]);
            }

            DB::commit();

            return response()->json(['status' => true, 'message' => 'Pemesanan Berhasil!', 'notrans' => $notrans]);
        } catch (Exception $e) {
            DB::rollBack();
            // dd($e);
            return response()->json(['status' => false, 'message' => $e->getMessage()], 500);
        }
    }




    /**
     * Display the specified resource.
     */
    public function faktur($nofaktur)
    {
        try {
            // Mendapatkan data transaksi berdasarkan nomor faktur
            $data['transaksi'] = Transaksi::where('id', $nofaktur)->with(['detailTransaksi' => function ($query) {
                $query->with('menu');
            }])->first();

            // Memastikan transaksi ditemukan sebelum ditampilkan
            if (!$data['transaksi']) {
                throw new Exception("Transaksi tidak ditemukan.");
            }

            // Mengembalikan view untuk mencetak faktur dengan data transaksi
            return view('cetak.faktur')->with($data);
        } catch (Exception | QueryException | PDOException $e) {
            // Menangani kesalahan jika terjadi
            dd($e);
            // return response()->json(['status'=>false, 'message'=>'Pemesanan Gagal!']);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransaksiRequest $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
