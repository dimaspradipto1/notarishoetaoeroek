<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PbbController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TanahController;
use App\Http\Controllers\LacakPBBController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IzinUsahaController;
use App\Http\Controllers\LacakTanahController;
use App\Http\Controllers\PbbGalleryController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\TanahGalleryController;
use App\Http\Controllers\LacakIzinUsahaController;
use App\Http\Controllers\LacakSertifikatController;
use App\Http\Controllers\IzinUsahaGalleryController;
use App\Http\Controllers\SertifikatGalleryController;
use App\Http\Controllers\BalikNamaSertifikatController;
use App\Http\Controllers\LacakBalikNamaSertifikatController;
use App\Http\Controllers\BalikNamaSertifikatGalleryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'login')->name('login');
    Route::post('/logiauth', 'loginauth')->name('loginauth');
    Route::get('/register', 'register')->name('register');
    Route::post('/registerauth', 'registerauth')->name('registerauth');
    Route::get('/logout', 'logout')->name('logout');
});

Route::middleware(['checkroles: ADMIN'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'admin'])->name('admin');
    Route::resource('/users', UserController::class);
    Route::resource('pbb', PbbController::class);
    Route::resource('pbb.pbb_gallery', PbbGalleryController::class)->shallow();
    Route::resource('sertifikat', SertifikatController::class);
    Route::resource('sertifikat.sertifikat_gallery', SertifikatGalleryController::class)->shallow();
    Route::resource('balik_nama_sertifikat', BalikNamaSertifikatController::class);
    Route::resource('balik_nama_sertifikat.balik_nama_sertifikat_gallery', BalikNamaSertifikatGalleryController::class)->shallow();
    Route::resource('izin_usaha', IzinUsahaController::class);
    Route::resource('izin_usaha.izin_usaha_gallery', IzinUsahaGalleryController::class)->shallow();
    Route::resource('tanah', TanahController::class);
    Route::resource('tanah.tanah_gallery', TanahGalleryController::class)->shallow();

    Route::resource('lacak-sertifikat', LacakSertifikatController::class);
    Route::resource('lacak-balik-nama-sertifikat', LacakBalikNamaSertifikatController::class);
    Route::resource('lacak-pbb', LacakPBBController::class);
    Route::resource('lacak-izin-usaha', LacakIzinUsahaController::class);
    Route::resource('lacak-tanah', LacakTanahController::class);

    // Route::get('lacak-sertifikat/{id}', [LacakSertifikatController::class, 'show'])->name('lacak-sertifikat.show');

    Route::get('export-sertifikat', [SertifikatController::class, 'export_sertifikat'])->name('export_sertifikat');
    Route::get('export-balik-nama-sertifikat', [BalikNamaSertifikatController::class, 'export_balik_nama_sertifikat'])->name('export_balik_nama_sertifikat');
    Route::get('export_pbb', [PbbController::class, 'export_pbb'])->name('export_pbb');
    Route::get('export_izin_usaha', [IzinUsahaController::class, 'export_izin_usaha'])->name('export_izin_usaha');
    Route::get('export_tanah', [TanahController::class, 'export_tanah'])->name('export_tanah');

    Route::get('export-sertifikat-rejected', [SertifikatController::class,    'export_sertifikat_rejected'])->name('export_sertifikat_rejected');
    Route::get('export-balik-nama-sertifikat-rejected', [BalikNamaSertifikatController::class, 'export_balik_nama_sertifikat_rejected'])->name('export_balik_nama_sertifikat_rejected');
    Route::get('export-pbb-rejected', [PbbController::class, 'export_pbb_rejected'])->name('export_pbb_rejected');
    Route::get('export-izin-usaha-rejected', [IzinUsahaController::class, 'export_izin_usaha_rejected'])->name('export_izin_usaha_rejected');
    Route::get('export-tanah-rejected', [TanahController::class, 'export_tanah_rejected'])->name('export_tanah_rejected');

    Route::get('export-sertifikat-approved', [SertifikatController::class, 'export_sertifikat_approved'])->name('export_sertifikat_approved');
    Route::get('export-balik-nama-sertifikat-approved', [BalikNamaSertifikatController::class, 'export_balik_nama_sertifikat_approved'])->name('export_balik_nama_sertifikat_approved');
    Route::get('export-pbb-approved', [PbbController::class, 'export_pbb_approved'])->name('export_pbb_approved');
    Route::get('export-izin-usaha-approved', [IzinUsahaController::class, 'export_izin_usaha_approved'])->name('export_izin_usaha_approved');
    Route::get('export-tanah-approved', [TanahController::class, 'export_tanah_approved'])->name('export_tanah_approved');
});


Route::middleware(['checkroles: USER'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'admin'])->name('admin');
   
});
