<?php

namespace App\Http\Controllers;

use App\Exports\ProdukTitipanExport;
use App\Models\ProdukTitipan;
use App\Http\Requests\StoreProdukTitipanRequest;
use App\Http\Requests\UpdateProdukTitipanRequest;
use App\Imports\ProdukTitipanImport;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;

class ProdukTitipanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $produk_titipan = ProdukTitipan::orderBy('created_at', 'DESC')->get();

            return view('produk_titipan.index', compact('produk_titipan'));
        } catch (QueryException | Exception | PDOException $error) {
            return back()->withError($error->getMessage())->withInput();
        }
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
    public function store(StoreProdukTitipanRequest $request)
    {
        $data = $request->all();
        $data['harga_jual'] = $this->hitungHargaJual($request->input('harga_beli'));

        ProdukTitipan::create($data);
        return redirect('produk_titipan')->with('success', 'Data Produk Titipan berhasil di tambahkan!');
    }


    private function hitungHargaJual($hargaBeli)
    {
        $keuntungan = $hargaBeli * 1.7;
        $hargaJual = ceil($keuntungan / 500) * 500;
        return $hargaJual;
    }

    /**
     * Display the specified resource.
     */
    public function show(ProdukTitipan $produkTitipan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProdukTitipan $produkTitipan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdukTitipanRequest $request, string $id)
    {
        $data = $request->all();
        $data['harga_jual'] = $this->hitungHargaJual($request->input('harga_beli'));

        ProdukTitipan::find($id)->update($data);
        return redirect('produk_titipan')->with('success', 'Update data berhasil');
    }

    public function updateStok(Request $request, $id)
    {
        // Validasi request
        $request->validate([
            'stok' => 'required|numeric'
        ]);

        try {
            // Cari produk berdasarkan ID
            $product = ProdukTitipan::findOrFail($id);

            // Update stok produk
            $product->stok = $request->stok;
            $product->save();

            // Redirect kembali ke halaman produk dengan pesan sukses
            return redirect('produk_titipan')->with('success', 'Stok produk berhasil diperbarui');
        } catch (\Throwable $th) {
            // Jika terjadi kesalahan, redirect dengan pesan kesalahan
            return redirect('produk_titipan')->with('error', 'Gagal memperbarui stok produk');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProdukTitipan $produkTitipan)
    {
        $produkTitipan->delete();
        return redirect('produk_titipan')->with('success', 'Data produkTitipan berhasil dihapus!');
    }

    public function generatepdf()
    {
        $produk_titipan = ProdukTitipan::all();
        $pdf = Pdf::loadView('produk_titipan.data', compact('produk_titipan'));
        return $pdf->download('produk_titipan.pdf');
    }

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new ProdukTitipanExport, $date . 'produk_titipan.xlsx');
    }

    public function importData(Request $request)
    {
        Excel::import(new ProdukTitipanImport, $request->import);
        return redirect()->back()->with('success', 'Import data jenis berhasil');
    }
}
