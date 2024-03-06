<?php

namespace App\Http\Controllers;

use App\Exports\MejaExport;
use App\Models\Meja;
use App\Http\Requests\StoreMejaRequest;
use App\Http\Requests\UpdateMejaRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Database\QueryException;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meja = meja::all();
        try {
            $data['meja'] = meja::orderBy('created_at', 'DESC')->get();

            return view('meja.index', compact('meja'));
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
    public function store(StoreMejaRequest $request)
    {
       meja::create($request->all());

        return redirect('meja')->with('success', 'Data meja berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Meja $meja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meja $meja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMejaRequest $request, Meja $meja)
    {
        $meja->update($request->all());
        return redirect('meja')->with('success', 'Update data berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meja $meja)
    {
        $meja->delete();
        return redirect('meja')->with('success', 'Data meja berhasil dihapus!');
    }
    public function generatepdf()
    {
        $meja = Meja::all();
        $pdf = Pdf::loadView('meja.data', compact('meja'));
        return $pdf->download('meja.pdf');
    }
    
    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new MejaExport, $date . 'meja.xlsx');
    }
}
