<?php

namespace App\Http\Controllers;

use App\Models\Radiologi;
use App\Http\Requests\{StoreRadiologiRequest, UpdateRadiologiRequest};
use Yajra\DataTables\Facades\DataTables;

class RadiologiController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:radiologi view')->only('index', 'show');
        $this->middleware('permission:radiologi create')->only('create', 'store');
        $this->middleware('permission:radiologi edit')->only('edit', 'update');
        $this->middleware('permission:radiologi delete')->only('destroy');
    }


    public function index()
    {
        return view('radiologis.index');
    }
}
