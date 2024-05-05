<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function dashboard_kunjungan_pasien(Request $request)
    {
        $from = date('Y-m-d') . " 00:00:00";
        $to = date('Y-m-d') . " 23:59:59";
        $microFrom = strtotime($from) * 1000;
        $microTo = strtotime($to) * 1000;

        $start_date = $request->query('start_date') !== null ? intval($request->query('start_date')) : $microFrom;
        $end_date = $request->query('end_date') !== null ? intval($request->query('end_date')) : $microTo;

        return view('dashboard.dashboard_kunjungan_pasien', [
            'microFrom' => $start_date,
            'microTo' => $end_date,
        ]);
    }


    public static function grafik_rawat_jalan_by_poliklinik()
    {
        $data = DB::table('tbl_regist')
            ->join('tbl_namapos', 'tbl_regist.kodepos', '=', 'tbl_namapos.kodepos')
            ->where('tbl_regist.tujuan', 1) // Menambahkan klausa WHERE
            ->select('tbl_regist.kodepos', 'tbl_namapos.namapost', DB::raw('COUNT(tbl_regist.noreg) as jumlah'))
            ->groupBy('tbl_regist.kodepos')
            ->get();
        return response()->json($data);
    }

    public static function grafik_rawat_inap_by_kelas()
    {
        $data = DB::table('tbl_regist')
            ->where('tbl_regist.tujuan', 2)
            ->select('tbl_regist.kelas', DB::raw('COUNT(tbl_regist.noreg) as jumlah'))
            ->groupBy('tbl_regist.kelas')
            ->get();
        return response()->json($data);
    }



    public function dashboard_penyakit(Request $request)
    {
        $from = date('Y-m-d') . " 00:00:00";
        $to = date('Y-m-d') . " 23:59:59";
        $microFrom = strtotime($from) * 1000;
        $microTo = strtotime($to) * 1000;

        $start_date = $request->query('start_date') !== null ? intval($request->query('start_date')) : $microFrom;
        $end_date = $request->query('end_date') !== null ? intval($request->query('end_date')) : $microTo;

        return view('dashboard.dashboard_penyakit', [
            'microFrom' => $start_date,
            'microTo' => $end_date,
        ]);
    }
}
