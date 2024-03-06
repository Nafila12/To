<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KategoryController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\ProdukTitipanController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Models\Meja;
use App\Models\ProdukTitipan;
use App\Policies\JenisPolicy;
use App\Policies\PemesananPolicy;


Route::post('/login/cek', [UserController::class, 'cekLogin'])->name('cekLogin');
Route::get('/login', [UserController::class, 'index',])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
// Route::resource('karyawan', KaryawanController::class);
// Route::resource('kategory', KategoryController::class);
// Route::resource('meja', MejaController::class);


//excel

Route::get('export/kategory', [KategoryController::class, 'exportData'])->name('dugong');
Route::get('export/jenis', [JenisController::class, 'exportData'])->name('nama');
Route::get('export/menu', [MenuController::class, 'exportData'])->name('tidak');
Route::get('export/pelanggan', [PelangganController::class, 'exportData'])->name('dd');
Route::get('export/produk_titipan', [ProdukTitipanController::class, 'exportData'])->name('xl-pt');

//pdf
Route::get('generate/kategori', [KategoryController::class, 'generatepdf'])->name('tilek');
Route::get('generate/jenis', [JenisController::class, 'generatepdf'])->name('dino');
Route::get('generate/menu', [MenuController::class, 'generatepdf'])->name('aku');
Route::get('generate/pelanggan', [PelangganController::class, 'generatepdf'])->name('ss');
Route::get('generate/produk_titipan', [ProdukTitipanController::class, 'generatepdf'])->name('xl-pdf');
// Route::get('nota/{nofaktur}', [TransaksiController::class, 'faktur']);

Route::post('kategory/import/kategory', [KategoryController::class, 'importData'])->name('kategory');

Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/', [HomeController::class, 'home']);
    
    Route::group(['middleware' => ['cekUserLogin:1']], function () {
        Route::resource('jenis', JenisController::class);
        Route::post('jenis/import', [JenisController::class, 'importData'])->name('import-jenis');
        Route::resource('menu', MenuController::class);
        Route::resource('stok', StokController::class);
        Route::resource('produk_titipan', ProdukTitipanController::class);
        Route::post('produk_titipan/import', [ProdukTitipanController::class, 'importData'])->name('import-produk_titipan');
        Route::resource('pelanggan', PelangganController::class);
        Route::resource('about', AboutController::class);
    });

    Route::group(['middleware' => ['cekUserLogin:2']], function () {
        Route::resource('pemesanan', PemesananController::class);
        Route::resource('transaksi', TransaksiController::class);
        Route::get('nota/{nofaktur}', [TransaksiController::class, 'faktur']);
    });
});
