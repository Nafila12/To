<?php

namespace App\Http\Controllers;

use App\Exports\PelangganExport;
use App\Models\pelanggan;
use App\Http\Requests\StorepelangganRequest;
use App\Http\Requests\UpdatepelangganRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Database\QueryException;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();
        try {
            $data['pelanggan'] = Pelanggan::orderBy('created_at', 'DESC')->get();

            return view('pelanggan.index', compact('pelanggan'));
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponses($error->getMessage(), $error->getCode());
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
    public function store(StorepelangganRequest $request)
    {
        Pelanggan::create($request->all());

        return redirect('pelanggan')->with('success', 'Data Pelanggan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepelangganRequest $request, pelanggan $pelanggan)
    {
        $pelanggan->update($request->all());

        return redirect('pelanggan')->with('success', 'Update data berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return redirect('pelanggan')->with('success', 'Data pelanggan berhasil dihapus!');
    
    }

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new PelangganExport, $date . 'pelanggan.xlsx');
    }
    
    public function generatepdf()
    {
        $pelanggan = pelanggan::all();
        $pdf = Pdf::loadView('pelanggan.data', compact('pelanggan'));
        return $pdf->download('pelanggan.pdf');
    }
}
