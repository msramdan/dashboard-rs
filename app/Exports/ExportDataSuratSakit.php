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


class ExportDataSuratSakit implements FromView, ShouldAutoSize, WithEvents
{
    function __construct($start_date, $end_date)
    {
        $this->start_date =  $start_date;
        $this->end_date =   $end_date;
    }

    public function view(): View
    {

        $data = DB::table('tbl_regist')
            ->where('tbl_rekammedisrs.ijinsakit', 1)
            ->join('tbl_rekammedisrs', 'tbl_regist.rekmed', '=', 'tbl_rekammedisrs.rekmed')
            ->join('tbl_pasien', 'tbl_regist.rekmed', '=', 'tbl_pasien.rekmed')
            ->join('tbl_dokter', 'tbl_regist.kodokter', '=', 'tbl_dokter.kodokter')
            ->select([
                'tbl_regist.noreg',
                'tbl_rekammedisrs.rekmed',
                'tbl_rekammedisrs.suhu', 
                'tbl_rekammedisrs.tglperiksa',
                'tbl_rekammedisrs.keluhanawal',
                'tbl_rekammedisrs.pfisik',
                'tbl_rekammedisrs.surat1',
                'tbl_rekammedisrs.diags',
                'tbl_pasien.namapas',
                'tbl_dokter.nadokter',

            ]);


        if (isset($this->end_date) && !empty($this->end_date)) {
            $to = date("Y-m-d H:i:s", substr($this->end_date, 0, 10));
            $data = $data->where('tbl_rekammedisrs.tglperiksa', '<=', $to);
        } else {
            $to = date('Y-m-d') . " 23:59:59";
            $data = $data->where('tbl_rekammedisrs.tglperiksa', '<=', $to);
        }

        if (isset($this->start_date) && !empty($this->start_date) && isset($this->end_date) && !empty($this->end_date)) {
            $from = date("Y-m-d H:i:s", substr($this->start_date, 0, 10));
            $to = date("Y-m-d H:i:s", substr($this->end_date, 0, 10));
            $data = $data->whereBetween('tbl_rekammedisrs.tglperiksa', [$from, $to]);
        } else {
            $from = date('Y-m-d') . " 00:00:00";
            $to = date('Y-m-d') . " 23:59:59";
            $data = $data->whereBetween('tbl_rekammedisrs.tglperiksa', [$from, $to]);
        }
        $data = $data->orderBy('tbl_rekammedisrs.tglperiksa', 'DESC')->get();
        return view('laporan.data_surat_sakit_excel', [
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
