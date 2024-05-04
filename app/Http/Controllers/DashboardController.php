<?php

namespace App\Http\Controllers;
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
