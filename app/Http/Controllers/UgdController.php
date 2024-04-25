<?php

namespace App\Http\Controllers;

use App\Models\Ugd;
use App\Http\Requests\{StoreUgdRequest, UpdateUgdRequest};
use Yajra\DataTables\Facades\DataTables;

class UgdController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ugd view')->only('index', 'show');
        $this->middleware('permission:ugd create')->only('create', 'store');
        $this->middleware('permission:ugd edit')->only('edit', 'update');
        $this->middleware('permission:ugd delete')->only('destroy');
    }

    public function index()
    {


        return view('ugds.index');
    }
}
