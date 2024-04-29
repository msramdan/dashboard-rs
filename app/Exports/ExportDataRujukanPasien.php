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


class ExportDataRujukanPasien implements FromView, ShouldAutoSize, WithEvents
{
    function __construct($start_date, $end_date)
    {
        $this->start_date =  $start_date;
        $this->end_date =   $end_date;
    }

    public function view(): View
    {

        $data = DB::table('bpjs_pcare_rujukan');

        if (isset($this->end_date) && !empty($this->end_date)) {
            $to = date("Y-m-d H:i:s", substr($this->end_date, 0, 10));
            $data = $data->where('bpjs_pcare_rujukan.tglKunjungan', '<=', $to);
        } else {
            $to = date('Y-m-d') . " 23:59:59";
            $data = $data->where('bpjs_pcare_rujukan.tglKunjungan', '<=', $to);
        }

        if (isset($this->start_date) && !empty($this->start_date) && isset($this->end_date) && !empty($this->end_date)) {
            $from = date("Y-m-d H:i:s", substr($this->start_date, 0, 10));
            $to = date("Y-m-d H:i:s", substr($this->end_date, 0, 10));
            $data = $data->whereBetween('bpjs_pcare_rujukan.tglKunjungan', [$from, $to]);
        } else {
            $from = date('Y-m-d') . " 00:00:00";
            $to = date('Y-m-d') . " 23:59:59";
            $data = $data->whereBetween('bpjs_pcare_rujukan.tglKunjungan', [$from, $to]);
        }
        $data = $data->orderBy('bpjs_pcare_rujukan.kodeRs', 'DESC')->get();
        return view('laporan.data_rujukan_pasien_excel', [
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
