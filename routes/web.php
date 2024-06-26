<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\ContacUsController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\diagramController;
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
use App\Http\Controllers\RegisterController;
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
Route::get('/contac', [ContacUsController::class, 'index']);
Route::resource('karyawan', KaryawanController::class);
Route::resource('kategory', KategoryController::class);
// Route::resource('meja', MejaController::class);


//excel

Route::get('export/kategory', [KategoryController::class, 'exportData'])->name('dugong');
Route::get('export/jenis', [JenisController::class, 'exportData'])->name('nama');
Route::get('export/menu', [MenuController::class, 'exportData'])->name('tidak');
Route::get('export/pelanggan', [PelangganController::class, 'exportData'])->name('dd');
Route::get('export/produk_titipan', [ProdukTitipanController::class, 'exportData'])->name('xl-pt');
Route::get('export/meja', [MejaController::class, 'exportData'])->name('xl-meja');
Route::get('export/absen', [AbsenController::class, 'exportData'])->name('xl-absen');

//pdf
Route::get('generate/kategori', [KategoryController::class, 'generatepdf'])->name('tilek');
Route::get('generate/jenis', [JenisController::class, 'generatepdf'])->name('dino');
Route::get('generate/transaksi', [TransaksiController::class, 'generatepdf'])->name('pem');
Route::get('generate/menu', [MenuController::class, 'generatepdf'])->name('aku');
Route::get('generate/pelanggan', [PelangganController::class, 'generatepdf'])->name('ss');
Route::get('generate/produk_titipan', [ProdukTitipanController::class, 'generatepdf'])->name('xl-pdf');
Route::get('generate/meja', [MejaController::class, 'generatepdf'])->name('pd-meja');
Route::get('generate/absen', [AbsenController::class, 'generatepdf'])->name('pd-absen');
// Route::get('nota/{nofaktur}', [TransaksiController::class, 'faktur']);

Route::post('kategory/import', [KategoryController::class, 'importData'])->name('import-kategory');
Route::post('meja/import', [MejaController::class, 'importData'])->name('import-meja');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'home']);
    Route::resource('grafik',diagramController::class);


    Route::group(['middleware' => ['cekUserLogin:1']], function () {
        Route::resource('jenis', JenisController::class);
        Route::post('jenis/import', [JenisController::class, 'importData'])->name('import-jenis');
        Route::resource('menu', MenuController::class);
        Route::resource('register', RegisterController::class);
        Route::resource('meja', MejaController::class);
        Route::resource('stok', StokController::class);
        Route::resource('absen', AbsenController::class);
        Route::resource('produk_titipan', ProdukTitipanController::class);
        Route::post('produk_titipan/import', [ProdukTitipanController::class, 'importData'])->name('import-produk_titipan');
        Route::post('/produk_titipan/{id}/update-stok', [ProdukTitipanController::class, 'updateStok'])->name('produk_titipan.update-stok');
        Route::resource('pelanggan', PelangganController::class);
        Route::resource('about', AboutController::class);
    });

    Route::group(['middleware' => ['cekUserLogin:2']], function () {
        Route::resource('/laporan', DetailTransaksiController::class);
        Route::resource('transaksi', TransaksiController::class);
        Route::resource('pemesanan', PemesananController::class);
        Route::get('nota/{nofaktur}', [TransaksiController::class, 'faktur']);
    });

});
