<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Exports\ExportKunjunganPasienPerDiagnosa;
use Maatwebsite\Excel\Facades\Excel;
use DateTime;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.index');
    }

    public function kunjungan_pasien_per_diagnosa(Request $request)
    {
        if (request()->ajax()) {
            $start_date = $request->query('start_date');
            $end_date = $request->query('end_date');

            $data = DB::table('tbl_regist')
                ->join('tbl_pasien', 'tbl_regist.rekmed', '=', 'tbl_pasien.rekmed')
                ->join('tbl_namapos', 'tbl_regist.kodepos', '=', 'tbl_namapos.kodepos')
                ->leftJoin('tbl_penjamin', 'tbl_regist.cust_id', '=', 'tbl_penjamin.cust_id')
                ->select(
                    'tbl_regist.noreg',
                    'tbl_regist.rekmed',
                    'tbl_regist.tglmasuk',
                    'tbl_regist.jenispas',
                    'tbl_pasien.namapas',
                    'tbl_pasien.jkel',
                    'tbl_pasien.tgllahir',
                    'tbl_namapos.namapost',
                    'tbl_penjamin.cust_nama'
                );

            if (isset($end_date) && !empty($end_date)) {
                $to = date("Y-m-d H:i:s", substr($request->query('end_date'), 0, 10));
                $data = $data->where('tbl_regist.tglmasuk', '<=', $to);
            } else {
                $to = date('Y-m-d') . " 23:59:59";
                $data = $data->where('tbl_regist.tglmasuk', '<=', $to);
            }

            if (isset($start_date) && !empty($start_date) && isset($end_date) && !empty($end_date)) {
                $from = date("Y-m-d H:i:s", substr($request->query('start_date'), 0, 10));
                $to = date("Y-m-d H:i:s", substr($request->query('end_date'), 0, 10));
                $data = $data->whereBetween('tbl_regist.tglmasuk', [$from, $to]);
            } else {
                $from = date('Y-m-d') . " 00:00:00";
                $to = date('Y-m-d') . " 23:59:59";
                $data = $data->whereBetween('tbl_regist.tglmasuk', [$from, $to]);
            }

            $data = $data->orderBy('tbl_regist.noreg', 'DESC')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('jkel', function ($row) {
                    return $row->jkel == 1 || $row->jkel == '1'  ? 'Pria' : 'Wanita';
                })
                ->addColumn('jenispas', function ($row) {
                    return $row->jenispas == 'PAS1'  ? 'Umum' :  $row->cust_nama;
                })
                ->addColumn('umur', function ($row) {
                    $tanggal_lahir = new DateTime($row->tgllahir);
                    $tanggal_sekarang = new DateTime(date('Y-m-d'));
                    $selisih = $tanggal_lahir->diff($tanggal_sekarang);
                    $umur_tahun = $selisih->y;
                    $umur_bulan = $selisih->m;
                    return $umur_tahun . " Th " . $umur_bulan . " Bln";
                })
                ->addColumn('icdcode', function ($row) {
                    $icdCodes = DB::table('tbl_icdtr')
                        ->where('noreg', $row->noreg)
                        ->pluck('icdcode');

                    $html = '';
                    foreach ($icdCodes as $icdCode) {
                        $html .= '<span class="badge bg-primary badge-sm">' . $icdCode . '</span>&nbsp;';
                    }

                    return $html;
                })
                ->rawColumns(['icdcode', 'str'])
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

    public function exportKunjunganPasienPerDiagnosa($start_date, $end_date)
    {
        $date = date('d-m-Y');
        $nameFile = 'Laporan kunjungan pasien per diagnosa ' . $date;
        return Excel::download(new ExportKunjunganPasienPerDiagnosa($start_date, $end_date), $nameFile . '.xlsx');
    }
}
