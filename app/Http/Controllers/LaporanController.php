<?php

namespace App\Http\Controllers;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.index');
    }

    public function kunjungan_pasien_per_diagnosa()
    {
        return view('laporan.kunjungan_pasien_per_diagnosa');
    }

    public function kunjungan_pasien()
    {
        return view('laporan.kunjungan_pasien');
    }

    public function data_rujukan_pasien()
    {
        return view('laporan.data_rujukan_pasien');
    }

    public function data_surat_sakit()
    {
        return view('laporan.data_surat_sakit');
    }

    public function data_surat_sehat()
    {
        return view('laporan.data_surat_sehat');
    }

    public function pasien_kunjungan_sakit_dan_kunjungan_sehat()
    {
        return view('laporan.pasien_kunjungan_sakit_dan_kunjungan_sehat');
    }

    public function laporan_summary_mcu()
    {
        return view('laporan.laporan_summary_mcu');
    }
}
