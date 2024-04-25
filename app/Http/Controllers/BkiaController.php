<?php

namespace App\Http\Controllers;

use App\Models\Bkia;
use App\Http\Requests\{StoreBkiaRequest, UpdateBkiaRequest};
use Yajra\DataTables\Facades\DataTables;

class BkiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:bkia view')->only('index', 'show');
        $this->middleware('permission:bkia create')->only('create', 'store');
        $this->middleware('permission:bkia edit')->only('edit', 'update');
        $this->middleware('permission:bkia delete')->only('destroy');
    }


    public function index()
    {
        return view('bkias.index');
    }
}
