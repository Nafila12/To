<?php

namespace App\Http\Controllers;

use App\Exports\AbsenExport;
use App\Models\absen;
use App\Http\Requests\StoreabsenRequest;
use App\Http\Requests\UpdateabsenRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Database\QueryException;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
            $absen = Absen::all();
            try {
                $data['absen'] = absen::orderBy('created_at', 'DESC')->get();
    
                return view('absen.index')->with($data);
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
    public function store(StoreabsenRequest $request)
    {
        absen::create($request->all());

        return redirect('absen')->with('success', 'Data Absen berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(absen $absen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(absen $absen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateabsenRequest $request, absen $absen)
    {
        {
            $absen->update($request->all());
    
            return redirect('absen')->with('success', 'Update data berhasil!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(absen $absen)
    {
        $absen->delete();
        return redirect('absen')->with('success', 'Data absen berhasil dihapus!');
    }

    public function generatepdf()
    {
        $absen = absen::all();
        $pdf = Pdf::loadView('absen.data', compact('absen'));
        return $pdf->download('absen.pdf');
    }

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new AbsenExport, $date . 'Absen.xlsx');
    }
}
