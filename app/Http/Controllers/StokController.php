<?php

namespace App\Http\Controllers;

use App\Models\stok;
use App\Http\Requests\StorestokRequest;
use App\Http\Requests\UpdatestokRequest;
use App\Models\Menu;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()                                                                                    
    {
        $stok = stok::all();
        try {
            $data['stok'] = stok::with(['menu'])->get();
            $data['menu'] = Menu::get();

            return view('stok.index')->with($data);
        } catch (QueryException | Exception | PDOException $error) {
            return redirect()->back()->withErrors(['message' => $error->getMessage()]);
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
public function store(StoreStokRequest $request)
    {
        {
            $stok = stok::where('menu_id', $request->menu_id)->get()->first();
            if (!$stok) {
                stok::create($request->all());
                return redirect('stok')->with('success', 'Data Stok berhasil di tambahkan!');
            }
            $stok->jumlah = (int)$stok->jumlah + (int)$request->jumlah;
            $stok->save();

            return redirect('stok')->with('success', 'Data Stok berhasil di tambahkan!');
        }
        // stok::create($request->all());

        // return redirect('stok')->with('success', 'Data Stok berhasil ditambahkan!');
    }
//     public function store(StoreStokRequest $request)
//     { {
//             $stok = Stok::where('menu_id', $request->menu_id)->get()->first();
//             if (!$stok) {
//                 Stok::create($request->all());
//                 return redirect('stok')->with('success', 'Data Stok berhasil di tambahkan!');
//             }
//             $stok->jumlah = (int)$stok->jumlah + (int)$request->jumlah;
//             $stok->save();

//             return redirect('stok')->with('success', 'Data Stok berhasil di tambahkan!');
//         }
// }

    /**
     * Display the specified resource.
     */
    public function show(stok $stok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(stok $stok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStokRequest $request, Stok $stok)
    {
        try {
            DB::beginTransaction();
            $stok = Stok::findOrFail($stok);
            $validate = $request->validated();
            $stok->update($validate);
            DB::commit();
            return redirect()->back()->with('success', 'data berhasil di ubah');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['message' => 'terjadi kesalahan']);
        }
    }
    public function destroy(stok $stok)
    {
        try {
            $stok->delete();
            return redirect('/stok')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }
}
