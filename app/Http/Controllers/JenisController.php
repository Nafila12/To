<?php

namespace App\Http\Controllers;

use App\Exports\JenisExport;
use App\Models\jeni;
use App\Http\Requests\StorejenisRequest;
use App\Http\Requests\UpdatejenisRequest;
use App\Imports\jenisImport;
use App\Models\jenis;
use App\Models\kategory;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // try {
        //     $jeni = jenis::with('kategori')->get();
        //     $kategori = kategory::all();

        //     return view('jenis.index', compact('jeni', 'kategori'));
        // } catch (QueryException | Exception | PDOException $error) {
        //     return redirect()->back()->withErrors(['message' => $error->getMessage()]);
        // }

        $jeni = jenis::all();
        try {
            $data['jenis'] = jenis::orderBy('created_at', 'DESC')->get();

            return view('jenis.index', compact('jeni'));
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
    public function store(StoreJenisRequest $request)
    {
        jenis::create($request->all());

        return redirect('jenis')->with('success', 'Data jenis berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(jenis $jenis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jenis $jenis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJenisRequest $request, $jeni)
    {
        try {
            DB::beginTransaction();
            $jeni = Jenis::findOrFail($jeni);
            $validate = $request->validated();
            $jeni->update($validate);
            DB::commit();
            return redirect()->back()->with('success', 'data berhasil di ubah');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['message' => 'terjadi kesalahan']);
        }
    }
    public function destroy(Jenis $jeni)
    {
        try {
            $jeni->delete();
            return redirect('/jenis')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new JenisExport, $date . 'jenis.xlsx');
    }

    public function generatepdf()
    {
        $jeni = jenis::all();
        $pdf = Pdf::loadView('jenis.data', compact('jeni'));
        return $pdf->download('jenis.pdf');
    }
    public function importData(Request $request)
    {
        Excel::import(new jenisImport, $request->import);
        return redirect()->back()->with('success', 'Import data jenis berhasil');
    }
}
