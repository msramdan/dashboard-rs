<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.index');
    }

    public function kunjungan_pasien_per_diagnosa(Request $request)
    {
        if (request()->ajax()) {
            $data = DB::table('tbl_regist')
                ->select(
                    'tbl_regist.noreg'
                );

            $data = $data->orderBy('tbl_regist.noreg', 'DESC')->get();
            return Datatables::of($data)
                ->toJson();
        }

        $from = date('Y-m-d') . " 00:00:00";
        $to = date('Y-m-d') . " 23:59:59";
        $microFrom = strtotime($from) * 1000;
        $microTo = strtotime($to) * 1000;

        $start_date = $request->query('start_date') !== null ? intval($request->query('start_date')) : $microFrom;
        $end_date = $request->query('end_date') !== null ? intval($request->query('end_date')) : $microTo;
        return view('laporan.kunjungan_pasien_per_diagnosa', [
            'microFrom' => $start_date,
            'microTo' => $end_date,
        ]);
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
