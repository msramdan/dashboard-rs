<?php

namespace App\Http\Controllers;

use App\Models\RekamMedi;
use App\Http\Requests\{StoreRekamMediRequest, UpdateRekamMediRequest};
use Yajra\DataTables\Facades\DataTables;

class RekamMediController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:rekam medi view')->only('index', 'show');
        $this->middleware('permission:rekam medi create')->only('create', 'store');
        $this->middleware('permission:rekam medi edit')->only('edit', 'update');
        $this->middleware('permission:rekam medi delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rekam-medis.index');
    }
}
