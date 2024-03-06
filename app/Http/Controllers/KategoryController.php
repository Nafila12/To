<?php

namespace App\Http\Controllers;

use App\Exports\KategoryExport;
use App\Models\kategory;
use App\Http\Requests\StorekategoryRequest;
use App\Http\Requests\UpdatekategoryRequest;
use App\Imports\KategoryImport;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Database\QueryException;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;

class KategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategory = kategory::all();
        try {
            $data['kategory'] = kategory::orderBy('created_at', 'DESC')->get();

            return view('kategory.index', compact('kategory'));
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
    public function store(StorekategoryRequest $request)
    {
        kategory::create($request->all());

        return redirect('kategory')->with('success', 'Data Kategory berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(kategory $kategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kategory $kategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatekategoryRequest $request, kategory $kategory)
    {
        $kategory->update($request->all());

        return redirect('kategory')->with('success', 'Update data berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kategory $kategory)
    {
        $kategory->delete();
        return redirect('kategory')->with('success', 'Data Kategory berhasil dihapus!');
    }

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new KategoryExport, $date . 'kategory.xlsx');
    }
   
    public function generatepdf()
    {
        $kategory = kategory::all();
        $pdf = Pdf::loadView('kategory.data', compact('kategory'));
        return $pdf->download('kategory.pdf');
    }

    public function importData(){
        Excel::import(new KategoryImport, request()->file('import'));

        return redirect(request()->segment(1).'/kategory')->with('success','Import Data Berhasil!!');
    }
}
