<?php

use Illuminate\Support\Facades\Route;

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

Route::controller(App\Http\Controllers\DashboardController::class)->group(function () {
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });
    Route::get('/dashboard', 'index')->name('dashboard');
    Route::get('/dashboard_kunjungan_pasien', 'dashboard_kunjungan_pasien')->name('dashboard_kunjungan_pasien');
    Route::get('/dashboard_penyakit', 'dashboard_penyakit')->name('dashboard_penyakit');
});

Route::controller(App\Http\Controllers\LaporanController::class)->group(function () {
    Route::get('/laporan', 'index')->name('laporan');
    Route::get('/kunjungan_pasien_per_diagnosa', 'kunjungan_pasien_per_diagnosa')->name('kunjungan_pasien_per_diagnosa');
    Route::get('/kunjungan_pasien', 'kunjungan_pasien')->name('kunjungan_pasien');
    Route::get('/data_rujukan_pasien', 'data_rujukan_pasien')->name('data_rujukan_pasien');
    Route::get('/data_surat_sakit', 'data_surat_sakit')->name('data_surat_sakit');
    Route::get('/data_surat_sehat', 'data_surat_sehat')->name('data_surat_sehat');
    Route::get('/pasien_kunjungan_sakit_dan_kunjungan_sehat', 'pasien_kunjungan_sakit_dan_kunjungan_sehat')->name('pasien_kunjungan_sakit_dan_kunjungan_sehat');
    Route::get('/laporan_summary_mcu', 'laporan_summary_mcu')->name('laporan_summary_mcu');
    Route::get('/pasien_kunjungan_sakit_dan_kunjungan_sehat ', 'pasien_kunjungan_sakit_dan_kunjungan_sehat ')->name('pasien_kunjungan_sakit_dan_kunjungan_sehat ');

    // Excel
    Route::get('/export-kunjungan-pasien-per-diagnosa/{start_date}/{end_date}', 'exportKunjunganPasienPerDiagnosa')->name('exportKunjunganPasienPerDiagnosa');
    Route::get('/export-data_rujukan_pasien/{start_date}/{end_date}', 'exportDataRujukanPasien')->name('exportdataRujukanPpasien');
    Route::get('/export-data_surat_sakit/{start_date}/{end_date}', 'exportDataSuratSakit')->name('exportDataSuratSakit');
    Route::get('/export-data_surat_sehat/{start_date}/{end_date}', 'exportDataSuratSehat')->name('exportDataSuratSehat');
    Route::get('/export-data_summary_mcu/{start_date}/{end_date}', 'exportDataSummaryMcu')->name('exportDataSummaryMcu');
    Route::get('/export-kunjungan-pasien/{start_date}/{end_date}', 'exportKunjunganPasien')->name('exportKunjunganPasien');
});


Route::middleware(['auth', 'web'])->group(function () {
    Route::get('/profile', App\Http\Controllers\ProfileController::class)->name('profile');
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('roles', App\Http\Controllers\RoleAndPermissionController::class);
});
