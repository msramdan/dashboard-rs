<?php

namespace App\Http\Controllers;

use App\Models\PoliUmum;
use App\Http\Requests\{StorePoliUmumRequest, UpdatePoliUmumRequest};
use Yajra\DataTables\Facades\DataTables;

class PoliUmumController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:poli umum view')->only('index', 'show');
        $this->middleware('permission:poli umum create')->only('create', 'store');
        $this->middleware('permission:poli umum edit')->only('edit', 'update');
        $this->middleware('permission:poli umum delete')->only('destroy');
    }


    public function index()
    {
        return view('poli-umums.index');
    }
}
