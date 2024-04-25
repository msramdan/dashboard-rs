<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Http\Requests\{StorePendaftaranRequest, UpdatePendaftaranRequest};
use Yajra\DataTables\Facades\DataTables;

class PendaftaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:pendaftaran view')->only('index', 'show');
        $this->middleware('permission:pendaftaran create')->only('create', 'store');
        $this->middleware('permission:pendaftaran edit')->only('edit', 'update');
        $this->middleware('permission:pendaftaran delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pendaftarans.index');
    }
}
