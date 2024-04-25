<?php

namespace App\Http\Controllers;

use App\Models\RawatInap;
use App\Http\Requests\{StoreRawatInapRequest, UpdateRawatInapRequest};
use Yajra\DataTables\Facades\DataTables;

class RawatInapController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:rawat inap view')->only('index', 'show');
        $this->middleware('permission:rawat inap create')->only('create', 'store');
        $this->middleware('permission:rawat inap edit')->only('edit', 'update');
        $this->middleware('permission:rawat inap delete')->only('destroy');
    }
    public function index()
    {

        return view('rawat-inaps.index');
    }
}
