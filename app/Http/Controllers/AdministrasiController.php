<?php

namespace App\Http\Controllers;

use App\Models\Administrasi;
use Yajra\DataTables\Facades\DataTables;

class AdministrasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:administrasi view')->only('index', 'show');
        $this->middleware('permission:administrasi create')->only('create', 'store');
        $this->middleware('permission:administrasi edit')->only('edit', 'update');
        $this->middleware('permission:administrasi delete')->only('destroy');
    }

    public function index()
    {

        return view('administrasi.index');
    }

    public function kunjungan_pasien_per_diagnosa()
    {
        return view('administrasi.kunjungan_pasien_per_diagnosa');
    }

    public function data_rujukan_pasien()
    {
        return view('administrasi.data_rujukan_pasien');
    }

    public function data_surat_sakit()
    {
        return view('administrasi.data_surat_sakit');
    }

    public function data_surat_sehat()
    {
        return view('administrasi.data_surat_sehat');
    }

    public function laporan_summary_mcu()
    {
        return view('administrasi.laporan_summary_mcu');
    }
}
