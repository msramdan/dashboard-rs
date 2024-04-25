<?php

namespace App\Http\Controllers;

use App\Models\Administrasi;
use App\Http\Requests\{StoreAdministrasiRequest, UpdateAdministrasiRequest};
use Yajra\DataTables\Facades\DataTables;

class AdministrasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:administrasi view')->only('index', 'show');
        $this->middleware('permission:administrasi create')->only('create', 'store');
        $this->middleware('permission:administrasi edit')->only('edit', 'update');
        $this->middleware('permission:administrasi delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('administrasi.index');
    }
}
