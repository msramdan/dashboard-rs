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
            ->where('tbl_regist.tujuan', 1)
            ->select('tbl_regist.kodepos', 'tbl_namapos.namapost', DB::raw('COUNT(tbl_regist.noreg) as jumlah'))
            ->groupBy('tbl_regist.kodepos')
            ->orderBy('jumlah', 'desc')
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

    public static function grafik_rawat_jalan_by_dokter()
    {
        $data = DB::table('tbl_regist')
            ->join('tbl_dokter', 'tbl_regist.kodokter', '=', 'tbl_dokter.kodokter')
            ->where('tbl_regist.tujuan', 1)
            ->select('tbl_regist.kodokter', 'tbl_dokter.nadokter', DB::raw('COUNT(tbl_regist.noreg) as jumlah'))
            ->groupBy('tbl_regist.kodokter')
            ->orderBy('jumlah', 'desc')
            ->get();
        return response()->json($data);
    }

    public static function grafik_rawat_inap_by_dokter()
    {
        $data = DB::table('tbl_regist')
            ->join('tbl_dokter', 'tbl_regist.kodokter', '=', 'tbl_dokter.kodokter')
            ->where('tbl_regist.tujuan', 2)
            ->select('tbl_regist.kodokter', 'tbl_dokter.nadokter', DB::raw('COUNT(tbl_regist.noreg) as jumlah'))
            ->groupBy('tbl_regist.kodokter')
            ->orderBy('jumlah', 'desc')
            ->get();
        return response()->json($data);
    }

    public static function grafik_rawat_jalan_by_cara_bayar()
    {
        $data = DB::table('tbl_regist')
            ->leftJoin('tbl_penjamin', 'tbl_regist.cust_id', '=', 'tbl_penjamin.cust_id')
            ->where('tbl_regist.tujuan', 1)
            ->select('tbl_regist.jenispas', 'tbl_penjamin.cust_nama', DB::raw('COUNT(tbl_regist.noreg) as jumlah'))
            ->groupBy('tbl_regist.cust_id')
            ->orderBy('jumlah', 'desc')
            ->get();
        return response()->json($data);
    }

    public static function grafik_rawat_inap_by_cara_bayar()
    {
        $data = DB::table('tbl_regist')
            ->leftJoin('tbl_penjamin', 'tbl_regist.cust_id', '=', 'tbl_penjamin.cust_id')
            ->where('tbl_regist.tujuan', 2)
            ->select('tbl_regist.jenispas', 'tbl_penjamin.cust_nama', DB::raw('COUNT(tbl_regist.noreg) as jumlah'))
            ->groupBy('tbl_regist.cust_id')
            ->orderBy('jumlah', 'desc')
            ->get();
        return response()->json($data);
    }
    // 7
    public static function grafik_rawat_jalan_by_jenis_kelamin()
    {
        $data = DB::table('tbl_regist')
            ->join('tbl_pasien', 'tbl_regist.rekmed', '=', 'tbl_pasien.rekmed')
            ->where('tbl_regist.tujuan', 1)
            ->select('tbl_pasien.jkel as jenis_kelamin', DB::raw('COUNT(tbl_regist.noreg) as jumlah'))
            ->groupBy('tbl_pasien.jkel')
            ->orderBy('jumlah', 'desc')
            ->get();
        return response()->json($data);
    }
    // 8
    public static function grafik_rawat_inap_by_jenis_kelamin()
    {
        $data = DB::table('tbl_regist')
            ->join('tbl_pasien', 'tbl_regist.rekmed', '=', 'tbl_pasien.rekmed')
            ->where('tbl_regist.tujuan', 2)
            ->select('tbl_pasien.jkel as jenis_kelamin', DB::raw('COUNT(tbl_regist.noreg) as jumlah'))
            ->groupBy('tbl_pasien.jkel')
            ->orderBy('jumlah', 'desc')
            ->get();
        return response()->json($data);
    }
    // 9
    public static function grafik_rawat_jalan_by_kelompok_umur()
    {
        $data = DB::table('tbl_regist')
            ->join('tbl_pasien', 'tbl_regist.rekmed', '=', 'tbl_pasien.rekmed')
            ->where('tbl_regist.tujuan', 1)
            ->select('tbl_pasien.jkel as jenis_kelamin', DB::raw('COUNT(tbl_regist.noreg) as jumlah'))
            ->groupBy('tbl_pasien.jkel')
            ->orderBy('jumlah', 'desc')
            ->get();
        return response()->json($data);
    }
    // 10
    public static function grafik_rawat_inap_by_kelompok_umur()
    {
        $data = DB::table('tbl_regist')
            ->join('tbl_pasien', 'tbl_regist.rekmed', '=', 'tbl_pasien.rekmed')
            ->where('tbl_regist.tujuan', 2)
            ->select('tbl_pasien.jkel as jenis_kelamin', DB::raw('COUNT(tbl_regist.noreg) as jumlah'))
            ->groupBy('tbl_pasien.jkel')
            ->orderBy('jumlah', 'desc')
            ->get();
        return response()->json($data);
    }

    // 11
    public static function grafik_rawat_jalan_by_agama()
    {
        $data = DB::table('tbl_regist')
            ->join('tbl_pasien', 'tbl_regist.rekmed', '=', 'tbl_pasien.rekmed')
            // ->join('tbl_setinghms', 'tbl_pasien.agama', '=', 'tbl_setinghms.id')
            ->where('tbl_regist.tujuan', 1)
            // ->select('tbl_setinghms.keterangan', DB::raw('COUNT(tbl_regist.noreg) as jumlah'))
            ->select('tbl_pasien.agama', DB::raw('COUNT(tbl_regist.noreg) as jumlah'))
            ->groupBy('tbl_pasien.agama')
            ->orderBy('jumlah', 'desc')
            ->get();
        return response()->json($data);
    }

    // 12
    public static function grafik_rawat_inap_by_agama()
    {
        $data = DB::table('tbl_regist')
            ->join('tbl_pasien', 'tbl_regist.rekmed', '=', 'tbl_pasien.rekmed')
            // ->join('tbl_setinghms', 'tbl_pasien.agama', '=', 'tbl_setinghms.id')
            ->where('tbl_regist.tujuan', 2)
            // ->select('tbl_setinghms.keterangan', DB::raw('COUNT(tbl_regist.noreg) as jumlah'))
            ->select('tbl_pasien.agama', DB::raw('COUNT(tbl_regist.noreg) as jumlah'))
            ->groupBy('tbl_pasien.agama')
            ->orderBy('jumlah', 'desc')
            ->get();
        return response()->json($data);
    }


    // 13
    public static function grafik_rawat_jalan_by_pekerjaan()
    {
        $data = DB::table('tbl_regist')
            ->join('tbl_pasien', 'tbl_regist.rekmed', '=', 'tbl_pasien.rekmed')
            // ->join('tbl_setinghms', 'tbl_pasien.pekerjaan', '=', 'tbl_setinghms.id')
            ->where('tbl_regist.tujuan', 1)
            // ->select('tbl_setinghms.keterangan', DB::raw('COUNT(tbl_regist.noreg) as jumlah'))
            ->select('tbl_pasien.pekerjaan', DB::raw('COUNT(tbl_regist.noreg) as jumlah'))
            ->groupBy('tbl_pasien.pekerjaan')
            ->orderBy('jumlah', 'desc')
            ->get();
        return response()->json($data);
    }

    // 14
    public static function grafik_rawat_inap_by_pekerjaan()
    {
        $data = DB::table('tbl_regist')
            ->join('tbl_pasien', 'tbl_regist.rekmed', '=', 'tbl_pasien.rekmed')
            // ->join('tbl_setinghms', 'tbl_pasien.pekerjaan', '=', 'tbl_setinghms.id')
            ->where('tbl_regist.tujuan', 2)
            // ->select('tbl_setinghms.keterangan', DB::raw('COUNT(tbl_regist.noreg) as jumlah'))
            ->select('tbl_pasien.pekerjaan', DB::raw('COUNT(tbl_regist.noreg) as jumlah'))
            ->groupBy('tbl_pasien.pekerjaan')
            ->orderBy('jumlah', 'desc')
            ->get();
        return response()->json($data);
    }

    // 15
    public static function grafik_rawat_jalan_by_desa()
    {
        $data = DB::table('tbl_regist')
            ->join('tbl_pasien', 'tbl_regist.rekmed', '=', 'tbl_pasien.rekmed')
            // ->join('tbl_kelurahan', 'tbl_pasien.kelurahan', '=', 'tbl_kelurahan.kodedesa')
            ->where('tbl_regist.tujuan', 1)
            ->select('tbl_pasien.kelurahan', DB::raw('COUNT(tbl_regist.noreg) as jumlah'))
            ->groupBy('tbl_pasien.kelurahan')
            ->orderBy('jumlah', 'desc')
            ->get();
        return response()->json($data);
    }

    // 16
    public static function grafik_rawat_inap_by_desa()
    {
        $data = DB::table('tbl_regist')
            ->join('tbl_pasien', 'tbl_regist.rekmed', '=', 'tbl_pasien.rekmed')
            // ->join('tbl_kelurahan', 'tbl_pasien.kelurahan', '=', 'tbl_kelurahan.kodedesa')
            ->where('tbl_regist.tujuan', 2)
            ->select('tbl_pasien.kelurahan', DB::raw('COUNT(tbl_regist.noreg) as jumlah'))
            ->groupBy('tbl_pasien.kelurahan')
            ->orderBy('jumlah', 'desc')
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
