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
    Route::get('/grafik_rawat_jalan_by_poliklinik', 'grafik_rawat_jalan_by_poliklinik')->name('grafik_rawat_jalan_by_poliklinik');
    Route::get('/grafik_rawat_inap_by_kelas', 'grafik_rawat_inap_by_kelas')->name('grafik_rawat_inap_by_kelas');
    Route::get('/grafik_rawat_jalan_by_dokter', 'grafik_rawat_jalan_by_dokter')->name('grafik_rawat_jalan_by_dokter');
    Route::get('/grafik_rawat_inap_by_dokter', 'grafik_rawat_inap_by_dokter')->name('grafik_rawat_inap_by_dokter');
    // 5
    Route::get('/grafik_rawat_jalan_by_cara_bayar', 'grafik_rawat_jalan_by_cara_bayar')->name('grafik_rawat_jalan_by_cara_bayar');
    // 6
    Route::get('/grafik_rawat_inap_by_cara_bayar', 'grafik_rawat_inap_by_cara_bayar')->name('grafik_rawat_inap_by_cara_bayar');
    // 7
    Route::get('/grafik_rawat_jalan_by_jenis_kelamin', 'grafik_rawat_jalan_by_jenis_kelamin')->name('grafik_rawat_jalan_by_jenis_kelamin');
    // 8
    Route::get('/grafik_rawat_inap_by_jenis_kelamin', 'grafik_rawat_inap_by_jenis_kelamin')->name('grafik_rawat_inap_by_jenis_kelamin');
    // 11
    Route::get('/grafik_rawat_jalan_by_agama', 'grafik_rawat_jalan_by_agama')->name('grafik_rawat_jalan_by_agama');
    // 12
    Route::get('/grafik_rawat_inap_by_agama', 'grafik_rawat_inap_by_agama')->name('grafik_rawat_inap_by_agama');
    // 13
    Route::get('/grafik_rawat_jalan_by_pekerjaan', 'grafik_rawat_jalan_by_pekerjaan')->name('grafik_rawat_jalan_by_pekerjaan');
    // 14
    Route::get('/grafik_rawat_inap_by_pekerjaan', 'grafik_rawat_inap_by_pekerjaan')->name('grafik_rawat_inap_by_pekerjaan');
    // 15
    Route::get('/grafik_rawat_jalan_by_desa', 'grafik_rawat_jalan_by_desa')->name('grafik_rawat_jalan_by_desa');
    // 16
    Route::get('/grafik_rawat_inap_by_desa', 'grafik_rawat_inap_by_desa')->name('grafik_rawat_inap_by_desa');
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
    Route::get('/export-kunjungan-pasien/{start_date}/{end_date}', 'exportKunjunganPasien')->name('exportKunjunganPasien');
    Route::get('/export-data_rujukan_pasien/{start_date}/{end_date}', 'exportDataRujukanPasien')->name('exportdataRujukanPpasien');
    Route::get('/export-data_surat_sakit/{start_date}/{end_date}', 'exportDataSuratSakit')->name('exportDataSuratSakit');
    Route::get('/export-data_surat_sehat/{start_date}/{end_date}', 'exportDataSuratSehat')->name('exportDataSuratSehat');
    Route::get('/export-data_summary_mcu/{start_date}/{end_date}', 'exportDataSummaryMcu')->name('exportDataSummaryMcu');
});


Route::middleware(['auth', 'web'])->group(function () {
    Route::get('/profile', App\Http\Controllers\ProfileController::class)->name('profile');
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('roles', App\Http\Controllers\RoleAndPermissionController::class);
});
