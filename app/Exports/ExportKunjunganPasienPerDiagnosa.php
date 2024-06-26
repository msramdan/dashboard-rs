<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;


class ExportKunjunganPasienPerDiagnosa implements FromView, ShouldAutoSize, WithEvents
{
    function __construct($start_date, $end_date)
    {
        $this->start_date =  $start_date;
        $this->end_date =   $end_date;
    }

    public function view(): View
    {

        $start_date = $this->start_date;
        $end_date = $this->end_date;

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
            $to = date("Y-m-d H:i:s", substr($this->end_date, 0, 10));
            $data = $data->where('tbl_regist.tglmasuk', '<=', $to);
        } else {
            $to = date('Y-m-d') . " 23:59:59";
            $data = $data->where('tbl_regist.tglmasuk', '<=', $to);
        }

        if (isset($start_date) && !empty($start_date) && isset($end_date) && !empty($end_date)) {
            $from = date("Y-m-d H:i:s", substr($this->start_date, 0, 10));
            $to = date("Y-m-d H:i:s", substr($this->end_date, 0, 10));
            $data = $data->whereBetween('tbl_regist.tglmasuk', [$from, $to]);
        } else {
            $from = date('Y-m-d') . " 00:00:00";
            $to = date('Y-m-d') . " 23:59:59";
            $data = $data->whereBetween('tbl_regist.tglmasuk', [$from, $to]);
        }

        $data = $data->orderBy('tbl_regist.noreg', 'DESC')->get();
        return view('laporan.kunjungan_pasien_per_diagnosa_excel', [
            'data' => $data
        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $cellRange = 'A1:I1'; // All headers
                $event->sheet->getStyle($cellRange)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
            },
        ];
    }
}
