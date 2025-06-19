<?php

use App\Models\Deviasi;
use App\Models\Dataumum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IkpaController;
use App\Http\Controllers\SkpdController;
use App\Http\Controllers\TkskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KodefikasiController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\LaporKerjaController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\PerusahaanController;

Route::get('/', [LoginController::class, 'welcome']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::middleware(['auth', 'superadmin'])->group(function () {
    Route::get('/superadmin', [HomeController::class, 'superadmin']);
    Route::get('/superadmin/laporan', [LaporanController::class, 'index']);

    Route::get('/superadmin/laporan/bulan', [LaporanController::class, 'bulan']);


    Route::get('/superadmin/kriteria', [KriteriaController::class, 'index']);
    Route::get('/superadmin/kriteria/add', [KriteriaController::class, 'add']);
    Route::get('/superadmin/kriteria/edit/{id}', [KriteriaController::class, 'edit']);
    Route::get('/superadmin/kriteria/delete/{id}', [KriteriaController::class, 'delete']);
    Route::post('/superadmin/kriteria/add', [KriteriaController::class, 'store']);
    Route::post('/superadmin/kriteria/edit/{id}', [KriteriaController::class, 'update']);

    Route::get('/superadmin/pegawai', [PegawaiController::class, 'index']);
    Route::get('/superadmin/pegawai/add', [PegawaiController::class, 'add']);
    Route::get('/superadmin/pegawai/edit/{id}', [PegawaiController::class, 'edit']);
    Route::get('/superadmin/pegawai/delete/{id}', [PegawaiController::class, 'delete']);
    Route::post('/superadmin/pegawai/add', [PegawaiController::class, 'store']);
    Route::post('/superadmin/pegawai/edit/{id}', [PegawaiController::class, 'update']);

    Route::get('/superadmin/penilaian', [PenilaianController::class, 'index']);
    Route::get('/superadmin/penilaian/add', [PenilaianController::class, 'add']);
    Route::get('/superadmin/penilaian/edit/{id}', [PenilaianController::class, 'edit']);
    Route::get('/superadmin/penilaian/delete/{id}', [PenilaianController::class, 'delete']);
    Route::post('/superadmin/penilaian/add', [PenilaianController::class, 'store']);
    Route::post('/superadmin/penilaian/edit/{id}', [PenilaianController::class, 'update']);

    Route::get('/superadmin/laporan/kriteria', [LaporanController::class, 'kriteria']);
    Route::get('/superadmin/laporan/pegawai', [LaporanController::class, 'pegawai']);
    Route::get('/superadmin/laporan/jabatan', [LaporanController::class, 'jabatan']);
    Route::get('/superadmin/laporan/penilaian', [LaporanController::class, 'penilaian']);
    Route::get('/superadmin/laporan/hasil', [LaporanController::class, 'hasil']);

    Route::get('/superadmin/normalisasi', [PerhitunganController::class, 'normalisasi']);
    Route::get('/superadmin/terbobot', [PerhitunganController::class, 'terbobot']);
    Route::get('/superadmin/solusi', [PerhitunganController::class, 'solusi']);
    Route::get('/superadmin/jarak', [PerhitunganController::class, 'jarak']);
    Route::get('/superadmin/preferensi', [PerhitunganController::class, 'preferensi']);

    Route::get('/laporan/pilih', [LaporanController::class, 'pilih']);
    Route::get('/laporan/klien/print', [LaporanController::class, 'pdfklien']);
    Route::get('/laporan/dokumen/print', [LaporanController::class, 'pdfdokumen']);
    Route::get('/laporan/evaluasi/print', [LaporanController::class, 'pdfevaluasi']);
    Route::get('/laporan/verifikasi/print', [LaporanController::class, 'pdfverifikasi']);
    Route::get('/laporan/dokumen', [LaporanController::class, 'dokumen']);
    Route::get('/laporan/verifikasi', [LaporanController::class, 'verifikasi']);
    Route::get('/laporan/evaluasi', [LaporanController::class, 'evaluasi']);
});
Route::get('/logout', function () {
    Auth::logout();
    Session::flash('success', 'Anda Telah Logout');
    return redirect('/');
});
